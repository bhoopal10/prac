 if($data){
                    $xml= new XMLWriter();
                    $xml->openURI('file.txt');
                   $xml->startDocument();
                   $xml->setIndent(true);
                   $xml->startElement('appointments');
                  $xml->startElement('user');
                    foreach($user_details as $key=>$value)
                        {
                           $xml->writeElement($key,$value);
                        }
                   $xml->endElement();
                    foreach($data as $Data1)
                     {
                        $xml->startElement('appointment');
                         foreach($Data1 as $key=>$value)
                         {
                            $xml->writeElement($key,$value);
                         }
                        $xml->endElement();
                    }
                  $xml->endElement();
                $handle=file('file.xml');
            $fp=fopen("one.xml","w");
            foreach($handle as $name)
            {
                fwrite($fp,Crypter::encrypt($name).',');
            }
            fclose($fp);
            $two=file('one.xml');
            $en=explode(',',$two[0]);
            array_pop($en);
            $ftwo=fopen('two.xml',"w");
            foreach($en as $val)
            {
                fwrite($ftwo,Crypter::decrypt($val));
            }
            fclose($ftwo);

        }