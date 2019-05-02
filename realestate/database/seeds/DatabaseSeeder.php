<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seed_m_slides_categories::class);
        $this->call(seed_m_slides::class);
        $this->call(seed_m_permissions::class);
        $this->call(seed_User::class);
        $this->call(seed_m_managers::class);
        $this->call(seed_m_managers_permissions::class);
        $this->call(seed_m_customers::class);
       
    }
}
class seed_m_slides_categories extends Seeder 
{
	public function run(){
		DB::table('m_slides_categories')->insert([
			['name'=>'Store introduction','alias'=>'store_introduction']
		]);
	}
}
class seed_m_customers extends Seeder 
{
	public function run(){
		DB::table('m_customers')->insert([
			['name'=>'Tunghoang','email'=>'state@gmail.com','password'=>bcrypt('02081996'),'tel'=>'0963936443','date_of_birth'=>'1996/08/02']
		]);
	}
}
class seed_m_slides extends Seeder 
{
	public function run(){
		DB::table('m_slides')->insert([
			['name'=>'New collection','alias'=>'store_introduction','url'=>'','image'=>'images/slides/slide4.jpg','summary'=>'Which brings the most wonderful things','slides_categories_id'=>1],
			['name'=>'Women’s clothing','alias'=>'store_introduction','url'=>'','image'=>'images/slides/slide5.jpg','summary'=>'Which brings the most wonderful things','slides_categories_id'=>1],
			['name'=>'New fashion men’s','alias'=>'store_introduction','url'=>'','image'=>'images/slides/slide6.jpg','summary'=>'Which brings the most wonderful things','slides_categories_id'=>1]
		]);
	}
}
class seed_m_permissions extends Seeder 
{
	public function run(){
		DB::table('m_permissions')->insert([
			['name'=>'permission','description'=>'Phân quyền','published'=>'0'],
			['name'=>'write','description'=>'Đăng bài','published'=>'1'],
			['name'=>'edit/update','description'=>'Chỉnh sửa/Cập nhật','published'=>'1'],
			['name'=>'delete','description'=>'Xóa','published'=>'1'],
			['name'=>'insert','description'=>'Thêm mới dữ liệu','published'=>'1']
		]);
	}
}
class seed_User extends Seeder 
{
	public function run(){
		DB::table('users')->insert([
			['name'=>'admin','email'=>'realestate@gmail.com','password'=>bcrypt('02081996')]
		]);
	}
}
class seed_m_managers extends Seeder 
{
	public function run(){
		DB::table('m_managers')->insert([
			['name'=>'admin','email'=>'realestate@gmail.com','password'=>bcrypt('02081996')]
		]);
	}
}
class seed_m_managers_permissions extends Seeder
{
	public function run(){
		DB::table('m_managers_permissions')->insert([
			['managers_id'=>'1','permissions_id'=>'1'],
			['managers_id'=>'1','permissions_id'=>'2'],
			['managers_id'=>'1','permissions_id'=>'3'],
			['managers_id'=>'1','permissions_id'=>'4'],
			['managers_id'=>'1','permissions_id'=>'5']

		]);
	}
}
