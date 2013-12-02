 $(function(){
            var lawyer_id=[ { label: "Choice1", value: "value1" },{ label: "Choice2", value: "value2" }];
            function split(val)
            {
                return val.split(/,\s*/);
            }

            function extractLast(term)
            {
                return split(term).pop();
            }
           $('#to')
               .bind("keydown",function(event)
               {
                   if(event.keyCode === $.ui.keyCode.TAB &&
                       $(this).data("ui-autocomplete").menu.active){
                       event.preventDefault();
                   }
               })
               .autocomplete({
                   minLength:1,
                   source:function(request, response){
                       response($.ui.autocomplete.filter(
                           lawyer_id,extractLast(request.term)
                       ));
                   },
                   focus: function()
                   {
                       return false;
                   },
                   select: function(event,ui)
                   {
                       var terms=split(this.value);
                       var values=ui.item.value;
                       var my=new Array();
                       var orig=$('#to_hidden').val();

                       my.push(ui.item.value);
                       terms.pop();
                       terms.push(ui.item.label);
                       terms.push("");
                       this.value=terms.join(", ");
                       $('#to_hidden').val(orig + ',' + values );
                       alert(my);
                       return false;
                   },
                   change: function( event, ui )
                   {
                       var terms=split(this.value);
                       var values=ui.item.value;
                       var my=new Array();
                       var orig=$('#to_hidden').val();

                       my.push(ui.item.value);
                       terms.pop();
                       terms.push(ui.item.label);
                       terms.push("");
                       this.value=terms.join(", ");
                       $('#to_hidden').val(orig + ',' + values );
                       alert(my);
                       return false;
                   }

               });

        });
