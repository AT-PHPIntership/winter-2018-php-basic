
1. tạo file config.php có const db connection :
DB_HOST=
DB_USERNAME=
DB_PASSWORD=
DB_PORT=
DB_NAME=

------

2. Tạo lớp trừu tượng tên `Model` có method public dbConfig() {} để connect DB load config từ file `config.php`.
  Method này được tự động load lúc khởi tạo.

------

3.

Tạo class `User` extends `Models`
- có các variable private :
  + $username;
  + $gender;
  + $provinceId;
Tạo class `UserController` extends `BaseController`
- có các method:
  + store(): Handle insert DB và show đối tượng vừa insert ra view
    - tạo method `insert` đầu vào param `$param` kiểu `array` trong model User để handle
      + Method có chức năng xử lý insert param vào bảng `user`
      + Kết quả đầu ra là trả về `đối tượng vừa Insert`.

  + index(); Show tất cả dữ liệu trong table user ra view dạng table
    - tạo method `selectAll` ko có param trong model User
      + Method có chức năng lấy tất cả dữ liệu trong bảng `user`.
      + Kết quả đầu ra là `obj`.

------

4.

Tạo class `Skill` extends `Models`
- có các variable private :
  + $name;

Tạo class `UserController` extends `BaseController`
- có các method:
  + store():Handle insert DB và show đối tượng vừa insert ra view
    - Tạo method `insert($param)` đầu vào param `$param` kiểu `array` trong models Skill
      + Method có chức năng xử lý insert param vào bảng `skill`
      + Kết quả đầu ra là trả về đối tượng vừa Insert.

  + index(): Show tất cả dữ liệu trong table user ra view dạng table
    - Tạo method `selectAll()` ko có param trong model Skill
      + Method có chức năng lấy tất cả dữ liệu trong bảng `skill`.
      + Kết quả đầu ra là `obj`.

  + update(): Update 1 record theo Id và show kết quả update
    - Tạo method `updateById($param, $id)` : đầu vào và kiểu dữ liệu ($param : array, $id: int). strong model Skill
      + Method có chức năng update dữ liệu dựa vào `id` trong vào bảng `skill`.
      + Kết quả đầu ra : `boolean` (thực hiện thành công trả về : true và ngược lại).

  + delete(): Delete 1 record theo id
    - Tạo method `delete($id)`  : đầu vào và kiểu dữ liệu ($id: int). trong model Skill
      + Method có chức năng xoá dữ liệu dựa vào `id` trong bảng `skill`.
      + Kết quả đầu ra là `boolean` (thực hiện thành công trả về : true và ngược lại).

------

5.

Tạo class `Score` extends `Models`
- có các variable private :
  + $userId;
  + $skillId;
  + $score;

Tạo controller `ScoreController` extends `BaseController`
- có các method
  + avgUser(): Tính trung bình từng user rồi show ra view dạng table.
  + maxSkillOfUser(): Tìm max skill của từng user rồi show ra view dạng table.
  + skillFavorite(): Tìm và show ra skill có nhiều user tham gia nhất
  + skillHasSecondPoint(): Tìm skill có điểm trung bình cao thứ hai sau đó show skill name, avg point và user nào học skill đó ra view.
