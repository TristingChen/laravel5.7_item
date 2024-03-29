<?php
/**
 * 后台管理
 */


//登录,退出
Route::any('login', 'PublicController@login')->name('login');
Route::any('logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');

/**
 * 首页，控制台
 */
Route::any('', 'IndexController@index')->name('/');
Route::any('flush', 'IndexController@flush')->name('flush');
Route::any('flexible', 'IndexController@flexible')->name('flexible');

/**
 * 个人中心
 */
Route::any('/me', 'AdminController@me')->name('me');


/**
 * 文件上传
 */
Route::post('/upload/{type}', 'FileController@upload')->name('upload');

/**
 * Rbac权限管理(用户管理)
 */
Route::any('rbac', 'AdminController@index')->name('rbac');
Route::any('rbac/admin', 'AdminController@index')->name('admin-users');
Route::any('rbac/admin/add', 'AdminController@add')->name('add-admin');
Route::any('rbac/admin/edit/{id}', 'AdminController@edit')->name('edit-admin');
Route::any('rbac/admin/assign/{id}', 'AdminController@assign')->name('assign-admin');
Route::get('rbac/admin/delete/{id}', 'AdminController@delete')->name('delete-admin');
Route::get('rbac/admin/status/{id}', 'AdminController@status')->name('status-admin');

/**
 * Rbac权限管理(角色管理)
 */
Route::any('rbac/roles', 'RoleController@index')->name('roles');
Route::any('rbac/role/add', 'RoleController@add')->name('add-role');
Route::any('rbac/role/edit/{id}', 'RoleController@edit')->name('edit-role');
Route::any('rbac/role/assign/{id}', 'RoleController@assign')->name('assign-permission');
Route::get('rbac/role/delete/{id}', 'RoleController@delete')->name('delete-role');

/**
 * Rbac权限管理(权限规则管理)
 */
Route::any('rbac/permission', 'PermissionController@index')->name('permission');
Route::any('rbac/permission/add', 'PermissionController@add')->name('add-permission');
Route::any('rbac/permission/edit/{id}', 'PermissionController@edit')->name('edit-permission');
Route::get('rbac/permission/menu/{id}', 'PermissionController@menu')->name('menu-permission');
Route::get('rbac/permission/sort/{id}', 'PermissionController@sort')->name('sort-permission');
Route::get('rbac/permission/delete/{id}', 'PermissionController@delete')->name('delete-permission');

/**
 * 用户管理
 */
Route::match(['get', 'post'], 'users', 'UserController@index')->name('users');

//代理管理
Route::any('agentmembers', 'AgentMembersController@index')->name('agentmembers');
Route::any('agentmembers/index', 'AgentMembersController@index')->name('agentmembers-index');
Route::any('agentmembers/index_json', 'AgentMembersController@index_json')->name('agentmembers-index-json');
Route::get('agentmembers/add', 'AgentMembersController@add')->name('agentmembers-add');
Route::get('agentmembers/edit', 'AgentMembersController@edit')->name('agentmembers-edit');
Route::post('agentmembers/save', 'AgentMembersController@save')->name('agentmembers-save');
Route::get('agentmembers/remove', 'AgentMembersController@remove')->name('agentmembers-remove');
Route::get('agentmembers/check', 'AgentMembersController@check')->name('agentmembers-checked');
Route::get('agentmembers/getcitylist', 'AgentMembersController@getCityList')->name('agentmembers-getcitylist');
Route::any('agentmembers/children_relation', 'AgentMembersController@children_relation')->name('agentmembers-children-relation');
Route::any('agentmembers/children_relation_json', 'AgentMembersController@children_relation_json')->name('agentmembers-children-relation-json');
//代理角色管理
Route::any('agentmembers/role_list', 'AgentMembersController@role_list')->name('agentmembers-role-list');
Route::any('agentmembers/role_list_json', 'AgentMembersController@role_list_json')->name('agentmembers-role-list-json');
Route::any('agentmembers/role_add', 'AgentMembersController@role_add')->name('agentmembers-role-add');
Route::any('agentmembers/role_edit', 'AgentMembersController@role_edit')->name('agentmembers-role-edit');
Route::any('agentmembers/role_save', 'AgentMembersController@role_save')->name('agentmembers-role-save');


//资源管理
Route::any('resourcemanage', 'ResourceManageController@index')->name('resourcemanage');
Route::any('resourcemanage/index', 'ResourceManageController@index')->name('resourcemanage-index');
Route::any('resourcemanage/index_json', 'ResourceManageController@index_json')->name('resourcemanage-index-json');
Route::any('resourcemanage/add', 'ResourceManageController@add')->name('resourcemanage-add');
Route::any('resourcemanage/edit', 'ResourceManageController@edit')->name('resourcemanage-edit');
Route::any('resourcemanage/save', 'ResourceManageController@save')->name('resourcemanage-save');
Route::any('resourcemanage/remove', 'ResourceManageController@remove')->name('resourcemanage-remove');
Route::get('resourcemanage/check', 'ResourceManageController@check')->name('resourcemanage-checked');
Route::post('resourcemanage/upload/{type}', 'ResourceManageController@upload')->name('resourcemanage-upload');