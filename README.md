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

## Project đang được xây dựng 1 phần được làm bằng API còn hầu như được kết nối trực tiếp

### Đã xây dựng được
## Dashboard : http://localhost:8080/login
1. Thông kê doanh thu và các thông tin cơ bản 
2. Chức năng cấp quyền cho chức ->(add/edit/delete)
3. Chức năng quản lý tài khoản khách hàng , nhân viên->(add/edit/delete)
4. Chức năng quản lý dịch vụ (phòng nghỉ , phương tiện , chuyến đi)->(add/edit/delete)
5. Chức năng quản lý dịch (Mã giảm giá, đơn hàng , tin tức , liên hệ)->(add/edit/delete/detail)
## Website : http://localhost:8080/index
1. Đăng nhập (có thể đăng nhập trực tiếp bằng tài khoản google)
- Chức năng quên mật khẩu người dùng : Cần thực hiện nhập email đã đăng ký -> xác nhận OTP được gửi về email -> nhập mật khẩu mới
2. Đăng ký (khi đăng ký cần xác nhận OTP trong email)
3. Chức năng tìm kiếm (theo tên, phương tiện , ngày khởi hành , ngày bắt đầu)
4. Chức năng lọc (lọc theo sao đánh giá , lọc theo mức giá , lọc theo ký tự A-Z, lọc theo giá tăng dần , giảm dần)
5. Chức năng đặt chuyến du lịch (thanh toán momo, Cod)
6. Chức năng xem bản tin (tìm kiếm, lọc, bình luận bản tin)
7. Chức năng liên hệ gửi yêu cầu khảo sát
## Thông tin khách hàng 
1. Chức năng hồ sơ cá nhân (thay đổi thông tin cá nhân tên, địa chỉ , số điện thoại, hình ảnh , email-> thay đổi email cần xác nhận OTP) 
2. Chức năng thay đổi mật khẩu 
3. Đơn hàng (chi tiết, liên hệ , hủy)
4. Lịch sử đặt hàng (chi tiết , đặt lại, đánh giá )

## Tài khoản sử dụng 
1. Tài khoản Admin   http://localhost:8080/login
email : admin@example.com
password: admin123
2. Tài khoản nhân viên
email: nhanvien@gmail.com
password : nhanvien123
3. Tài khoản khách hàng tự tạo bằng google http://localhost:8080/index
