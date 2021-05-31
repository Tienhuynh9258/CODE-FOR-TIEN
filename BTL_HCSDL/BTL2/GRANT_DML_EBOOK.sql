-- Hiện thực phân quyền
-- i
-- i.1,2 Cập nhật thông tin về sách khi sách được xuất/nhập kho.
drop procedure if exists updateExImport;
delimiter //
create procedure updateExImport(WH varchar(100), EID char(9),Im_Qty int,Ex_Qty int, ISBN_up char(13), Date_im_ex Date)
begin
declare avail int;
insert into checks
values( ISBN_up,EID,WH,Im_Qty,Ex_Qty,Date_im_ex);
select AVAILABLE_QTY into avail
from stocked_in
where TRD_BOOK_ISBN=ISBN_up and WNAME=WH;
update stocked_in
set AVAILABLE_QTY = avail+Im_Qty-Ex_Qty
where TRD_BOOK_ISBN=ISBN_up and WNAME=WH;
end //
delimiter ;

-- i.3 Cập nhật thông tin giao dịch khi giao dịch trực tuyến gặp sự cố.
drop procedure if exists updateTransaction;
delimiter //
create procedure updateTransaction(pdate datetime, id char(9), status_in varchar(50)) 
begin
declare status_1 varchar(50);
select trans_status into status_1 from book_transaction
where CID = id and purchased_date= pdate;
if status_1 = 'ERROR' then
update book_transaction
set trans_status = status_in, response_date = now()
where CID = id and purchased_date= pdate;
end if;
end //
delimiter ;

-- i.4 Xem tất cả các sách tính theo ISBN được mua trong một ngày.
drop procedure if exists viewAllISBN;
delimiter //
create procedure viewAllISBN(dateneed date) 
begin
select ISBN,TITLE from book
where book.ISBN in (select ISBN from book_in_transaction
					where date(PURCHASED_DATE)=dateneed and TRANS_TYPE='BUY');
end //
delimiter ;

-- i.5 Xem tổng số sách tính theo mỗi ISBN được mua trong một ngày.
drop procedure if exists viewSumOfISBN;
delimiter //
create procedure viewSumOfISBN(dateneed date)
begin
select ISBN,sum(QTY) as sum_qty from book_in_transaction
where date(PURCHASED_DATE)=dateneed and TRANS_TYPE='BUY'
group by ISBN;       
end //
delimiter ;

-- i.6 Xem tổng số sách truyền thống tính theo mỗi ISBN được mua trong một ngày.
drop procedure if exists viewSumOfTradi;
delimiter //
create procedure viewSumOfTradi(dateneed date)
begin
select ISBN,sum(QTY) AS sum_qty from book_in_transaction
where date(PURCHASED_DATE)=dateneed and TRANS_TYPE='BUY' and ISBN in (select ISBN from traditional_book)
group by ISBN;       
end //
delimiter ;
-- call viewSumOfTradi('2021-3-1');

-- i.7 Xem tổng số sách điện tử được mua trong một ngày.
drop procedure if exists viewSumOfEbookBuy;
delimiter //
create procedure viewSumOfEbookBuy(dateneed date)
begin
select ISBN,count(ISBN) AS sum_qty from book_in_transaction
where date(PURCHASED_DATE)=dateneed and TRANS_TYPE='BUY' and ISBN in (select ISBN from ebook);     
end //
delimiter ;
-- call viewSumOfEbookBuy('2018-07-11');

-- i.8 Xem tổng số sách điện tử được thuê trong một ngày.
drop procedure if exists viewSumOfEbookBorrow;
delimiter //
create procedure viewSumOfEbookBorrow(dateneed date)
begin
select ISBN,count(ISBN) AS sum_qty from book_in_transaction
where date(PURCHASED_DATE)=dateneed and TRANS_TYPE='BORROW' and ISBN in (select ISBN from ebook);   
end //
delimiter ;
-- call viewSumOfEbookBorrow('2019-11-23');

-- i.9 Xem danh sách tác giả có số sách được mua nhiều nhất trong một ngày.
drop procedure if exists viewAuListDate;
delimiter //
create procedure viewAuListDate(dateneed date)
begin
select  author.id,
			author.aname,
            concat(dayofmonth(dateneed),'/',month(dateneed),'/',year(dateneed)) as chosen_purchased_date,
			count(*) as total_transaction,
            sum(book_in_transaction.qty) as quantity_book
	from author
	join book
		on author.id = book.author_id
	join book_transaction
		on book.isbn = book_transaction.isbn
	join book_in_transaction
		on book_transaction.cid = book_in_transaction.cid and
			book_transaction.isbn = book_in_transaction.isbn and
            book_transaction.purchased_date = book_in_transaction.purchased_date
 	where book_transaction.purchased_date =dateneed 
	group by author.id
    having quantity_book = (
								select max(test) 
								from (
										select sum(book_in_transaction.qty) as test
										from author
										join book
											on author.id = book.author_id
										join book_transaction
											on book.isbn = book_transaction.isbn
										join book_in_transaction
											on  book_transaction.cid = book_in_transaction.cid and
												book_transaction.isbn = book_in_transaction.isbn and
												book_transaction.purchased_date = book_in_transaction.purchased_date
										where book_transaction.purchased_date = dateneed
										group by author.id
									  )
								as max_test
							);
end //
delimiter ;
-- call viewAuListDate('2021-3-1');

-- i.10 Xem danh sách tác giả có số sách được mua nhiều nhất trong một tháng.
drop procedure if exists viewAuListMonth;
delimiter //
create procedure viewAuListMonth(monthneed int,yearneed year)
begin
	select  author.id,
			author.aname,
			count(*) as total_transaction,
            sum(book_in_transaction.qty) as quantity_book
	from author
	join book
		on author.id = book.author_id
	join book_transaction
		on book.isbn = book_transaction.isbn
	join book_in_transaction
		on book_transaction.cid = book_in_transaction.cid and
			book_transaction.isbn = book_in_transaction.isbn and
            book_transaction.purchased_date = book_in_transaction.purchased_date
	where month(book_transaction.purchased_date) = monthneed
			and year(book_transaction.purchased_date) = yearneed
 	group by author.id
    having quantity_book = (
								select max(test) 
								from (
										select sum(book_in_transaction.qty) as test
										from author
										join book
											on author.id = book.author_id
										join book_transaction
											on book.isbn = book_transaction.isbn
										join book_in_transaction
											on  book_transaction.cid = book_in_transaction.cid and
												book_transaction.isbn = book_in_transaction.isbn and
												book_transaction.purchased_date = book_in_transaction.purchased_date
										where month(book_transaction.purchased_date) = monthneed
												and year(book_transaction.purchased_date) = yearneed
										group by author.id
									  )
								as max_test
							);
end //
delimiter ;
-- call viewAuListMonth(3,2021);

-- i.11 Xem danh sách sách được mua nhiều nhất trong một tháng.
drop procedure if exists viewBookListMonth;
delimiter //
create procedure viewBookListMonth(monthneed int,yearneed year)
begin
declare maxnum int;
drop temporary table if exists sumbookmonth;
create temporary table sumbookmonth
select ISBN,sum(qty) as qtybook from book_in_transaction where month(PURCHASED_DATE)=monthneed and year(PURCHASED_DATE)=yearneed and TRANS_TYPE='BUY' group by ISBN;
select max(qtybook) into maxnum from sumbookmonth;
select bb.ISBN,bb.TITLE from book bb
where bb.ISBN in (select s.ISBN from sumbookmonth s where qtybook = maxnum) ;
end //
delimiter ;
-- call viewBookListMonth(3,2021);

-- i.12 Xem danh sách mua hàng được thanh toán bằng thẻ trong một ngày.
drop procedure if exists viewTransactionCreditDay;
delimiter //
create procedure viewTransactionCreditDay(dateneed date)
begin
select * from book_transaction b
where date(PURCHASED_DATE)=dateneed and (b.CID,b.purchased_date) in (select p.CID,p.PURCHASED_DATE from payment p
									where p.ID in (select c.ID from credit_payment c));
end //
delimiter ;
-- call viewTransactionCreditDay('2021-3-1');

-- i.13 Xem danh sách mua hàng được thanh toán bằng thẻ gặp sự cố trong một ngày.
drop procedure if exists viewErrorTransactionDay;
delimiter //
create procedure viewErrorTransactionDay(dateneed date)
begin
select * from book_transaction b
where date(PURCHASED_DATE)=dateneed and (TRANS_STATUS='ERROR' OR not isnull(RESPONSE_DATE));
end //
delimiter ;
-- call viewErrorTransactionDay('2021-3-1');
-- i.14 Xem danh sách kho hàng có số sách tính theo mỗi ISBN dưới N quyển.
drop procedure if exists viewWHhaveISBNlessthanN;
DELIMITER //
CREATE PROCEDURE viewWHhaveISBNlessthanN(ISBN CHAR(13), N INT)
BEGIN
	SELECT warehouse.WNAME
    FROM warehouse, stocked_in
    WHERE stocked_in.TRD_BOOK_ISBN = ISBN AND warehouse.WNAME = stocked_in.WNAME AND stocked_in.AVAILABLE_QTY < N;
END;//
DELIMITER ;
-- CALL viewWHhaveISBNlessthanN('0000000000002', 50);

-- i.16 Xem danh sách kho hàng được xuất kho nhiều nhất trong một khoảng thời gian.
drop procedure if exists WHExportMost;
delimiter //
create procedure  WHExportMost(from_time date, next_time date)
begin
DECLARE MAX_SUM_EX INT DEFAULT 0;
    DROP TABLE IF EXISTS TEMP;
	CREATE TABLE TEMP
	select W.WNAME AS WHNAME, sum(EX_QTY) AS SUM_EX
	FROM warehouse W, checks C
	WHERE C.DATE_IM_EX >= from_time AND C.DATE_IM_EX <= next_time AND W.WNAME = C.WNAME
	GROUP BY W.WNAME;
    
    SELECT MAX(SUM_EX) INTO MAX_SUM_EX FROM TEMP;
    
    SELECT WHNAME FROM TEMP
    WHERE SUM_EX = MAX_SUM_EX;
end //
delimiter ;
-- call WHExportMost('2020-01-01','2030-05-24');

-- ii
-- ii.1
DROP PROCEDURE IF EXISTS capnhatthongtincanhan;
DELIMITER //
CREATE PROCEDURE capnhatthongtincanhan(id char(9),
							USERNAME 	VARCHAR(20), 
							PWD 	longtext,
							PHONE 	CHAR(11),
							EMAIL	VARCHAR(50),
							FNAME	VARCHAR(100),
							LNAME 	VARCHAR(100)  	
                            )
	Begin
		START TRANSACTION;
		UPDATE customer
					SET customer.USERNAME=username,
                    customer.pwd=pwd,
                    customer.phone=phone,
                    customer.email=email,
                    customer.fname=fname,
                    customer.lname=lname
		where customer.id=id;
		COMMIT;
	end //
DELIMITER ;


-- ii.2
DROP PROCEDURE IF EXISTS capnhatthongtinthanhtoan;
DELIMITER //
CREATE PROCEDURE capnhatthongtinthanhtoan(CCODE 	CHAR(16), 
							EXPIRATION_DATE 	DATE,
							ONAME 	VARCHAR(100),
							BNAME		VARCHAR(100),
							BRANCH_NAME 	 	VARCHAR(100),
                            CID char(9)
                            )
	Begin
		START TRANSACTION;
		UPDATE credit_card
					SET credit_card.expiration_date=expiration_date,
                    credit_card.oname=oname,
                    credit_card.bname=bname,
                    credit_card.branch_name=branch_name
		where credit_card.ccode=ccode;
		COMMIT;
	end //
DELIMITER ;credit_card


-- ii.3
DROP PROCEDURE IF EXISTS capnhatgiaodichmuahang;
DELIMITER //
CREATE PROCEDURE capnhatgiaodichmuahang(CID 	char(9), 
							ISBN 	CHAR(13),
							QTY		INT,
							BTIME 	datetime
                            )
	Begin
		START TRANSACTION;
		UPDATE buys_borrows
					SET buys_borrows.qty=qty,
                    buys_borrows.btime=btime
		where buys_borrows.cid=cid and buys_borrows.ISBN=ISBN;
		COMMIT;
	end //
DELIMITER ;


-- ii.4 Xem danh sách sách theo thể loại 
DROP PROCEDURE IF EXISTS DSSach_Theloai;
DELIMITER //
Create PROCEDURE DSSach_Theloai(bfield varchar(50)) 
BEGIN  
    DROP TABLE IF EXISTS THELOAI;
	CREATE temporary TABLE THELOAI AS
   SELECT TITLE,BOOK.ISBN,PRICE,PUBLISHER_NAME,IMAGE_URL FROM ( book  join book_field on book.ISBN=book_field.ISBN)
where book_field.bfield=bfield;  
 SELECT * FROM THELOAI;
END 
//
DELIMITER ;
-- call DSSach_Theloai('LICH SU');

DROP PROCEDURE IF EXISTS DSSach_tacgia;
DELIMITER //
-- (ii.5). Xem danh sách sách theo tác giả.
Create PROCEDURE DSSach_tacgia (aname varchar(100)) 
BEGIN  
   SELECT * FROM book,author
where author.aname=aname and author.id=book.author_id;  
END 
//
DELIMITER ;
-- call DSSach_tacgia('J. K. Rowling');

-- (ii.6).Xem danh sách sách theo từ khóa
DROP PROCEDURE IF EXISTS DSSach_tukhoa;
DELIMITER //
Create PROCEDURE DSSach_tukhoa (keyword varchar(50)) 
BEGIN  
   SELECT * FROM ( book  join book_keyword on book.ISBN=book_keyword.ISBN)
where book_keyword.keyword=keyword;  
END 
//
DELIMITER ;
-- call DSSach_tukhoa('cooking');

-- ii.7 Xem danh sách sách theo năm xuất bản
DROP PROCEDURE IF EXISTS DSSach_NamXuatBan;
DELIMITER //
Create PROCEDURE DSSach_NamXuatBan(pyear int) 
BEGIN  
  SELECT *
    FROM book B, book_year_published Y
    WHERE Y.PYEAR = pyear AND B.ISBN = Y.ISBN; 
END 
//
DELIMITER ;
-- call DSSach_NamXuatBan(2021);

-- ii.8 Xem danh sách sách mà mình đã mua trong một tháng, thiếu dữ liệu trong buys_borrows
drop table if exists danhsachmuatrong1thang;
create table danhsachmuatrong1thang(id char(9),isbn char(13),title varchar(100),price bigint, qty int,trans_type varchar(50));
DROP PROCEDURE IF EXISTS DSSach_MuaTrongThang;
DELIMITER //
Create PROCEDURE DSSach_MuaTrongThang(id char(9),start_date datetime,end_date datetime) 
BEGIN  
	insert into danhsachmuatrong1thang(id,ISBN,title,price,qty,trans_type)
   SELECT id,book.ISBN,title,price,qty,trans_type FROM ( customer join book_transaction on customer.id=book_transaction.CID 
   join book_in_transaction on book_transaction.cid=book_in_transaction.cid join book on book_in_transaction.ISBN=book.ISBN)
where book_transaction.PURCHASED_DATE>=start_date and book_transaction.PURCHASED_DATE<=end_date and customer.id=id and trans_type='Buy';  
END 
//
DELIMITER ;

-- ii.9 Xem danh sách giao dịch mà mình đã thực hiện trong một tháng
DELIMITER //
DROP PROCEDURE IF EXISTS transactions_in_month//

CREATE PROCEDURE transactions_in_month(IN desired_month INT, IN desired_year INT, IN C_ID CHAR(9))
BEGIN
	IF (desired_month >= 1 AND desired_month <= 12) THEN 
		SELECT 	*
        FROM	BOOK_TRANSACTION
        WHERE	MONTH(PURCHASED_DATE) = desired_month 
				AND YEAR(PURCHASED_DATE) = desired_year 
				AND CID = C_ID;
	END IF;
END//
DELIMITER ;

-- ii.10 Xem danh sách các giao dịch gặp sự cố mà mình đã thực hiện trong 1 tháng
DELIMITER //
DROP PROCEDURE IF EXISTS transactions_error_in_month//

CREATE PROCEDURE transactions_error_in_month(IN desired_month INT, IN desired_year INT, IN C_ID CHAR(9))
BEGIN
	IF (desired_month >= 1 AND desired_month <= 12) THEN 
		SELECT 	*
        FROM 	BOOK_TRANSACTION
        WHERE	MONTH(PURCHASED_DATE) = desired_month 
				AND YEAR(PURCHASED_DATE) = desired_year 
                AND CID = C_ID 
                AND TRANS_STATUS = 'ERROR';
	END IF;
END//
DELIMITER ;

-- ii.11 Xem danh sách các giao dịch mà mình đã thực hiện nhưng chưa hoàn tất
DELIMITER //
DROP PROCEDURE IF EXISTS transactions_waiting_in_month//

CREATE PROCEDURE transactions_waiting_in_month(IN desired_month INT, IN desired_year INT, IN C_ID CHAR(9))
BEGIN
	IF (desired_month >= 1 AND desired_month <= 12) THEN 
		SELECT	*
        FROM 	BOOK_TRANSACTION
        WHERE 	MONTH(PURCHASED_DATE) = desired_month 
				AND YEAR(PURCHASED_DATE) = desired_year 
                AND TRANS_STATUS = 'WAITING';
	END IF;
END//
DELIMITER ;

DELIMITER //

-- ii.12 xem danh sách tác giả của cùng 1 thể loại
DROP PROCEDURE IF EXISTS DSSach_TacGiaCungTheLoai;
DELIMITER //
Create PROCEDURE DSSach_TacGiaCungTheLoai(bfield varchar(50)) 
BEGIN  
	SELECT * FROM BOOK,BOOK_FIELD,AUTHOR WHERE BOOK.ISBN=BOOK_FIELD.ISBN AND BOOK_FIELD.BFIELD=bfield AND AUTHOR.ID=BOOK.AUTHOR_ID;
END 
//
DELIMITER ;
-- call DSSach_TacGiaCungTheLoai('CODE');

-- ii.13 Xem danh sách tác giả của cùng một số từ khóa.
DELIMITER //

DROP PROCEDURE IF EXISTS authors_by_keyword//

CREATE PROCEDURE authors_by_keyword(IN words CHAR(50))
BEGIN
	SELECT	KEYWORD, ANAME
    FROM	BOOK AS B, BOOK_KEYWORD AS BK, AUTHOR AS A
    WHERE	BK.ISBN = B.ISBN 
			AND B.AUTHOR_ID = A.ID
    GROUP BY	BK.KEYWORD
    HAVING BK.KEYWORD = words;
END//

DELIMITER ;

-- ii.14 Xem tổng số sách theo từng thể loại mà mình đã mua trong một tháng.
DELIMITER //

DROP PROCEDURE IF EXISTS bought_book_by_field//

CREATE PROCEDURE bought_book_by_field(IN desired_month INT, IN desired_year INT, IN C_ID CHAR(9))
BEGIN
    SELECT	BFIELD, SUM(QTY)
    FROM	BOOK_TRANSACTION, BOOK_FIELD, BOOK_IN_TRANSACTION
    WHERE	MONTH(PURCHASED_DATE) = desired_month 
			AND YEAR(PURCHASED_DATE) = desired_year 
			AND STATUS = 'SUCCESS' 
            AND CID = C_ID 
            AND TRANS_TYPE = 'BUY'
    GROUP BY BFIELD;
END//

DELIMITER ;

-- ii.15 Xem các giao dịch mà mình đã thực hiện có số lượng sách được mua nhiều nhất trong một tháng.
DELIMITER //

DROP PROCEDURE IF EXISTS most_quantity_bought_book//

CREATE PROCEDURE most_quantity_bought_book(IN desired_month INT, IN desired_year INT, IN C_ID CHAR(9))
BEGIN
	SELECT	TITLE, MAX(QTY)
    FROM	BOOK_IN_TRANSACTION AS A, BOOK AS B
    WHERE	MONTH(A.PURCHASED_DATE) = desired_month 
			AND YEAR(A.PURCHASED_DATE) = desired_year 
            AND A.ISBN = B.ISBN 
            AND CID = C_ID;
END//

DELIMITER ;
-- ii.16  Xem các giao dịch vừa có sách truyền thống vừa có sách điện tử được mua hoặc thuê mà mình đã thực hiện trong một tháng.
drop procedure if exists viewTransactionhaveboth;
delimiter //
create procedure viewTransactionhaveboth(id char(9))
begin
drop temporary table if exists Categorybook;
create temporary table Categorybook
select cid,PURCHASED_DATE, case when isbn in (select isbn from ebook) then 'Ebook' when isbn in (select isbn from traditional_book) then 'Traditional' end as Category from book_in_transaction ;
drop temporary table if exists CountCategorybook;
create temporary table CountCategorybook
select cid,PURCHASED_DATE, 
  COUNT(IF(category = 'Ebook', 1, NULL)) 'Ebook',
    COUNT(IF(category = 'Traditional', 1, NULL)) 'Traditional'
FROM Categorybook;
select PURCHASED_DATE from CountCategorybook
where Ebook>0 and Traditional>0 and CID=id;

end //
delimiter ;


DROP user IF EXISTS 'employee'@'localhost';
create user 'employee'@'localhost';
GRANT SELECT ON book TO 'employee'@'localhost';
GRANT SELECT ON publisher TO 'employee'@'localhost';
GRANT SELECT ON author TO 'employee'@'localhost';
GRANT SELECT ON ebook TO 'employee'@'localhost';
GRANT SELECT ON traditional_book TO 'employee'@'localhost';
GRANT SELECT ON employee TO 'employee'@'localhost';
GRANT SELECT ON warehouse TO 'employee'@'localhost';
GRANT SELECT ON address_method TO 'employee'@'localhost';
GRANT SELECT ON credit_card TO 'employee'@'localhost';
GRANT SELECT ON cod TO 'employee'@'localhost';
GRANT SELECT ON shipping_method TO 'employee'@'localhost';
GRANT SELECT ON work_for TO 'employee'@'localhost';
GRANT SELECT,UPDATE,INSERT,DELETE ON stocked_in TO 'employee'@'localhost';
-- GRANT SELECT ON written_by TO 'employee';
GRANT SELECT ON book_field TO 'employee'@'localhost';
GRANT SELECT ON book_keyword TO 'employee'@'localhost';
GRANT SELECT ON book_year_published TO 'employee'@'localhost';
GRANT UPDATE,SELECT,DELETE,UPDATE ON checks TO 'employee'@'localhost';
GRANT UPDATE,SELECT,DELETE,UPDATE ON customer TO 'employee'@'localhost';
GRANT UPDATE,SELECT,DELETE,INSERT ON book_transaction TO 'employee'@'localhost';
GRANT SELECT ON payment TO 'employee'@'localhost';
GRANT SELECT ON transfer TO 'employee'@'localhost';
GRANT SELECT ON credit_payment TO 'employee'@'localhost';
GRANT SELECT ON buys_borrows TO 'employee'@'localhost';
GRANT SELECT ON book_in_transaction TO 'employee'@'localhost';
-- i.1,2
GRANT EXECUTE ON PROCEDURE ebookstore.updateExImport TO 'employee'@'localhost';
-- i.3
GRANT EXECUTE ON PROCEDURE ebookstore.updateTransaction TO 'employee'@'localhost';
-- i.4
GRANT EXECUTE ON PROCEDURE ebookstore.viewAllISBN TO 'employee'@'localhost';
-- i.5
GRANT EXECUTE ON PROCEDURE ebookstore.viewSumOfISBN TO 'employee'@'localhost';
-- i.6
GRANT EXECUTE ON PROCEDURE ebookstore.viewSumOfTradi TO 'employee'@'localhost';
-- i.7
GRANT EXECUTE ON PROCEDURE ebookstore.viewSumOfEbookBuy TO 'employee'@'localhost';
-- i.8
GRANT EXECUTE ON PROCEDURE ebookstore.viewSumOfEbookBorrow TO 'employee'@'localhost';
-- i.9
GRANT EXECUTE ON PROCEDURE ebookstore.viewAuListDate TO 'employee'@'localhost';
-- i.10
GRANT EXECUTE ON PROCEDURE ebookstore.viewAuListMonth TO 'employee'@'localhost';
-- i.11
GRANT EXECUTE ON PROCEDURE ebookstore.viewBookListMonth TO 'employee'@'localhost';
-- i.12
GRANT EXECUTE ON PROCEDURE ebookstore.viewTransactionCreditDay TO 'employee'@'localhost';
-- i.13
GRANT EXECUTE ON PROCEDURE ebookstore.viewErrorTransactionDay TO 'employee'@'localhost';
-- i.14
GRANT EXECUTE ON PROCEDURE ebookstore.viewWHhaveISBNlessthanN TO 'employee'@'localhost';
-- i.16
GRANT EXECUTE ON PROCEDURE ebookstore.WHExportMost TO 'employee'@'localhost';

DROP user IF EXISTS 'customer'@'localhost';
create user 'customer'@'localhost';
GRANT SELECT ON book TO 'customer'@'localhost';
GRANT SELECT ON publisher TO 'customer'@'localhost';
GRANT SELECT ON author TO 'customer'@'localhost';
GRANT SELECT ON ebook TO 'customer'@'localhost';
GRANT SELECT ON traditional_book TO 'customer'@'localhost';
GRANT SELECT ON stocked_in TO 'customer'@'localhost';
GRANT SELECT ON address_method TO 'customer'@'localhost';
GRANT SELECT,UPDATE,INSERT ON credit_card TO 'customer'@'localhost';
GRANT SELECT ON cod TO 'customer'@'localhost';
GRANT SELECT ON shipping_method TO 'customer'@'localhost';
GRANT SELECT ON work_for TO 'customer'@'localhost';
-- GRANT SELECT ON written_by TO 'employee';
GRANT SELECT ON book_field TO 'employee'@'localhost';
GRANT SELECT ON book_keyword TO 'employee'@'localhost';
GRANT SELECT ON book_year_published TO 'employee'@'localhost';
GRANT UPDATE,SELECT ON customer TO 'customer'@'localhost';
-- GRANT UPDATE,SELECT,DELETE,INSERT ON customer_shipping_addr TO 'customer';
GRANT SELECT ON book_transaction TO 'customer'@'localhost';
GRANT SELECT ON payment TO 'customer'@'localhost';
GRANT SELECT ON transfer TO 'customer'@'localhost';
GRANT SELECT ON credit_payment TO 'customer'@'localhost';
GRANT SELECT,DELETE,UPDATE,INSERT ON buys_borrows TO 'customer'@'localhost';
GRANT SELECT ON book_in_transaction TO 'customer'@'localhost';
-- ii.1
GRANT EXECUTE ON PROCEDURE ebookstore.capnhatthongtincanhan TO 'customer'@'localhost';
-- ii.2
GRANT EXECUTE ON PROCEDURE ebookstore.capnhatthongtinthanhtoan TO 'customer'@'localhost';
-- ii.3
GRANT EXECUTE ON PROCEDURE ebookstore.capnhatgiaodichmuahang TO 'customer'@'localhost';
-- ii.4
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_Theloai TO 'customer'@'localhost';
-- ii.5
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_tacgia TO 'customer'@'localhost';
-- ii.6
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_tukhoa TO 'customer'@'localhost';
-- ii.7
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_NamXuatBan TO 'customer'@'localhost';
-- ii.8
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_MuaTrongThang TO 'customer'@'localhost';
-- ii.9
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_GiaoDichTrongThang TO 'customer'@'localhost';
-- ii.10
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_SuCoTrongThang TO 'customer'@'localhost';
-- ii.11
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_ChuaHoanThanh TO 'customer'@'localhost';
-- ii.12
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_TacGiaCungTheLoai TO 'customer'@'localhost';
-- ii.13
GRANT EXECUTE ON PROCEDURE ebookstore.DSSach_TuKhoaTacGia TO 'customer'@'localhost';
-- ii.14
GRANT EXECUTE ON PROCEDURE ebookstore.SumByField TO 'customer'@'localhost';
-- ii.15
GRANT EXECUTE ON PROCEDURE ebookstore.TransactionHaveMostBook TO 'customer'@'localhost';
-- ii.16
GRANT EXECUTE ON PROCEDURE ebookstore.viewTransactionhaveboth TO 'customer'@'localhost';






