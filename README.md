## Công nghệ sử dụng 
code php + CodeIgniter 4 + Datatable js
Kiến thức cần có
- Ajax
- Framework CodeIgniter 
- PHP
- JavaScript
- Bootstrap
- Datatable.js
- Editor Datatable
- jquery

## Yêu cầu 
1. Màn hình quản lý danh sách group quyền(add/edit/delete). Datatable
2. Màn hình quản lý danh sách role(add/edit/delete). Datatable
3. Màn hình cấp quyền cho group(1 role có thể nằm trong nhiều group)
4. Màn hình quản lý danh sách user
5. Poup cấp quyền group user
6. Middleware check quyền trước khi load các page

## Kết quả 
1. Đã đặt được các yêu cầu trên 
2. Thay đổi chức vụ cấp quyền cho chức vụ thành công
3. Đã có sự kết hợp thay đổi trực tiếp 
4. Đã xử lý tài khoản có quyền truy cập gì thì mới hiện lên quyền của tài khoản đó tai giao diện
5. Thay đổi xử lý các yêu cầu của chức năng

## Nhược điểm 
1. cookie đã chạy được và xóa khi đăng xuất nhưng vẫn đề tự mất đi trong 3 phút vẫn đang lỗi chưa mất
2. khi thay đổi chức vụ của nhân viên thì nhân viên logout tài khoản và login lại thì chức vụ mới được cập nhật lại
3. Giao diện chưa được chỉnh cho kĩ càng vẫn còn chưa chỉnh chu
4. Chưa cập nhật loading hiệu ứng 
