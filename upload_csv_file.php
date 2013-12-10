       <form action="<?php echo URL::to_route('UserFile'); ?>" method="post" enctype="multipart/form-data" id="upload" style="display: none" >
             <input type="file" name="user" id="user" style="display: none" onselect=""/>
            <label for="" id="up" style="float: right">ClickHere To Add Bulk Lawyers</label>
        </form>
        <script>
            var fl = document.getElementById('user');
            fl.onchange = function(){

                var ext = this.value.match(/\.(.+)$/)[1];
                switch(ext)
                {
                    case 'csv':
                        $('#upload').submit();
                        break;

                    default:
                        alert('Upload only .csv file');
                        this.value='';
                }
            };
            $('#up').click(function(){
               $('#user').click();
            });


        </script>
