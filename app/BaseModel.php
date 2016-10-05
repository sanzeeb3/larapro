<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class BaseModel extends Model

{
	public function selectQuery($sql_stmt)
{
	return DB::select($sql_stmt);
}
      public function sqlstatement($sql_stmt)
{
	Db::statement($sql_stmt);
}


}