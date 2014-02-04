prac
====
/* to add extra column in to table by using this syntax in laravel3 */
====
  $r=Schema::table('payment', function($table)
        {
        $table->string('modified_date',10);
        });
