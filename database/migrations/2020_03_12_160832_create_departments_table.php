<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Repositories\DepartmentRepository;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id('department_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->tinyInteger('unlimit_access')->default(0);
            $table->integer('user_id')->unsigned();
			$table->nestedSet();
	        $table->integer('updated_at');
	        $table->integer('created_at');
        });
		$DepartmentRepository	= new DepartmentRepository(null);
		$DepartmentRepository->insert([
			'name'			=> 'root',
			'description'	=> '',
			'parent_id'		=> 0,
			'user_id'		=> 1,
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
