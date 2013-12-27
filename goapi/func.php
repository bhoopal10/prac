<?php
/**
 * Created by PhpStorm.
 * User: bhoo
 * Date: 12/27/13
 * Time: 4:04 PM
 */
require_once '../google-api/src/Google_Client.php';
require_once '../google-api/src/contrib/Google_DriveService.php';

/**
 * Insert new file.
 *
 * @param Google_DriveService $service Drive API service instance.
 * @param string $title Title of the file to insert, including the extension.
 * @param string $description Description of the file to insert.
 * @param string $parentId Parent folder's ID.
 * @param string $mimeType MIME type of the file to insert.
 * @param string $filename Filename of the file to insert.
 * @return Google_DriveFile The file that was inserted. NULL is returned if an API error occurred.
 */
function insertFile($service, $title, $description, $parentId, $mimeType, $filename) {
    $file = new Google_DriveFile();
    $file->setTitle($title);
    $file->setDescription($description);
    $file->setMimeType($mimeType);

    // Set the parent folder.
    if ($parentId != null) {
        $parent = new Google_ParentReference();
        $parent->setId($parentId);
        $file->setParents(array($parent));
    }

    try {
        $data = file_get_contents($filename);

        $createdFile = $service->files->insert($file, array(
            'data' => $data,
            'mimeType' => $mimeType,
        ));

        // Uncomment the following line to print the File ID
        // print 'File ID: %s' % $createdFile->getId();

        return $createdFile;
    } catch (Exception $e) {
        print "An error occurred: " . $e->getMessage();
    }

}

function createFolder($service,$title,$description)
{
    $folder= new Google_DriveFile();

    //Setup the Folder to Create
    $folder->setTitle($title);
    $folder->setDescription($description);
    $folder->setMimeType('application/vnd.google-apps.folder');

    //Set the ProjectsFolder Parent
    $parent=new Google_ParentReference();
    $parent->setId('0AGFs2pO9JavEUk9PVA');
    $folder->setParents(array($parent));

    try
    {
        //create the ProjectFolder in the Parent
        $createdFile=$service->files->insert($folder,array('mimeType'=>'application/vnd.google-apps.folder',));
        return $createdFile;
    }
    catch (Exception $e)
    {
        print "An error occurred: " . $e->getMessage();
    }

}




