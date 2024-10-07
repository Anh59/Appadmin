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

## Kết quả 
1. Đã đặt được các yêu cầu trên 
2. Thay đổi chức vụ cấp quyền cho chức vụ thành công
3. Đã có sự kết hợp thay đổi trực tiếp 
4. Đã xử lý tài khoản có quyền truy cập gì thì mới hiện lên quyền của tài khoản đó tai giao diện
5. Thay đổi xử lý các yêu cầu của chức năng
6. Các chức vụ nhân viên và quản lý admin đều ổn
## Nhược điểm 
1. cookie đã chạy được và xóa khi đăng xuất nhưng vẫn đề tự mất đi trong 3 phút vẫn đang lỗi chưa mất
2. khi thay đổi chức vụ của nhân viên thì nhân viên logout tài khoản và login lại thì chức vụ mới được cập nhật lại
3. Giao diện chưa được chỉnh cho kĩ càng vẫn còn chưa chỉnh chu
4. Chưa cập nhật loading hiệu ứng server khi chạy update 
5. Chức năng chức vụ thừa có thể bỏ và thêm 1 tác vụ vào chức năng phân quản lý phân quyền 
6. Chưa được tối ưu hóa các câu lệnh truy vấn dẫn đến khi thực hiện truy vẫn với số lượng lớn dẫn đến bị display ,trì hoãn dẫn đến website báo lỗi
7. Chưa có hệ thống bảo mật dẫn đến lỗi , hack truy cập dễ dàng để phá hoại dữ liệu
8. chưa câp nhật quản lý tài khoản user người sử dụng trên trang web
9. cần sắp xếp lại các file code cho khoa học hơn chia riêng các view backend -fontend xây dựng server báo lỗi
10. viêt auto test và set up môi trường code lại từ đầu , xây dựng lại hệ thống tài liệu 
11. xây dưng các use case diagram sơ đồ database , mô tả  chức năng hoạt động và quy trình thực hiện của use khi truy cập website, đồng thời nhân viên cũng cần phải có hướng dẫn chi tiết để sử dụng quản lý thông tin website tour du lịch , đặt vé khách hàng dịch vụ vé
12. Thống kê giá trị khách hàng , chuyến đi , hàng hóa lưu chuyển thanh toán QR, Xử lý giao nhận khách hàng , phản hồi khách hàng , dịch vụ thông tin cá nhân và công ty và nhóm làm việc kinh doanh hằng ngày 
13. Lên báo cáo chi tiết về tiếp thị khách hàng và quảng cáo , tư vấn thuê KOL , Tiktoker review,Facebook,Zalo, Telegram ,Instagram,...và các nền tảng khác trên mạng xã hội
14. Xây dựng quy trinh giám sát đối với các tài khoản trong hệ thống ngoại trừ Admin và CEO
15. Tester các use case , php test code sơ đồ phân tích
16. 
17. 
18. 
19. 
20. 
21. 
22. 
23. 
24. 
25. 
26. use case
27. mô tả 
28. Vẽ sơ đồ activity
29. Cập nhật tài liệu 
30. sơ đồ activity diagram

110. sơ đồ phân loại các chức năng tour 
210. xây dựng sơ đồ toàn diện
310. Lên kế hoạch xây dựng sơ đồ ERD
410. Sơ đồ cơ sở dữ liệu 
510. học 
610. từ vựng
710. Báo cáo