<?php

namespace Database\Seeders;

use App\Models\Permisson;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'super-admin', 'display_name' => 'Super Admin', 'group' => 'system'],
            ['name' => 'admin', 'display_name' => 'Admin', 'group' => 'system'],

            ['name' => 'employee', 'display_name' => 'employee', 'group' => 'system'],

            ['name' => 'manager', 'display_name' => 'manager', 'group' => 'system'],

            ['name' => 'user', 'display_name' => 'user', 'group' => 'system'],

        ];
        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }

        $permissions = [
            ['name' => 'Tạo tài khoản', 'display_name' => 'Tạo  tài khoản', 'group' => 'Tài khoản'],
            ['name' => 'Cập nhật tài khoản', 'display_name' => 'Cập nhật  tài khoản', 'group' => 'Tài khoản'],
            ['name' => 'Xem tài khoản', 'display_name' => 'Xem  tài khoản', 'group' => 'Tài khoản'],
            ['name' => 'Xóa tài khoản', 'display_name' => 'Xóa  tài khoản', 'group' => 'Tài khoản'],
            
            ['name' => 'Tạo quyền hạn', 'display_name' => 'Tạo  quyền hạn', 'group' => 'Quyền hạn'],
            ['name' => 'Cập nhật quyền hạn', 'display_name' => 'Cập nhật  quyền hạn', 'group' => 'Quyền hạn'],
            ['name' => 'Xem quyền hạn', 'display_name' => 'Xem  quyền hạn', 'group' => 'Quyền hạn'],
            ['name' => 'Xóa quyền hạn', 'display_name' => 'Xóa  quyền hạn', 'group' => 'Quyền hạn'],
            
            ['name' => 'Tạo danh mục', 'display_name' => 'Tạo  danh mục', 'group' => 'Danh mục'],
            ['name' => 'Cập nhật danh mục', 'display_name' => 'Cập nhật  danh mục', 'group' => 'Danh mục'],
            ['name' => 'Xem danh mục', 'display_name' => 'Xem  danh mục', 'group' => 'Danh mục'],
            ['name' => 'Xóa danh mục', 'display_name' => 'Xóa  danh mục', 'group' => 'Danh mục'],
            
            ['name' => 'Tạo sản phẩm', 'display_name' => 'Tạo sản phẩm', 'group' => 'Sản phẩm'],
            ['name' => 'Cập nhật sản phẩm', 'display_name' => 'Cập nhật sản phẩm', 'group' => 'Sản phẩm'],
            ['name' => 'Xem sản phẩm', 'display_name' => 'Xem sản phẩm', 'group' => 'Sản phẩm'],
            ['name' => 'Xóa sản phẩm', 'display_name' => 'Xóa sản phẩm', 'group' => 'Sản phẩm'],
    
            ['name' => 'Danh sách đơn hàng', 'display_name' => 'Danh sách đơn hàng', 'group' => 'Đơn hàng'],
            ['name' => 'Cập nhật trạng thái đơn hàng', 'display_name' => 'Cập nhật order status', 'group' => 'Đơn hàng'],
    
        ];
        foreach ($permissions as $item){
            Permisson::updateOrCreate($item);
        }
    }
}
