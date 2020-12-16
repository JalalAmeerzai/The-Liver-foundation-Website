

CREATE TABLE  users(
    user_name varchar(30) NOT NULL,
    user_password varchar(20) NOT NULL,
    role varchar(10) NOT NULL,
    user_email varchar(20) NOT NULL,
    user_full_name varchar(50) NOT NULLX,
    PRIMARY KEY (user_name)
)


INSERT INTO users VAUES("Admin" , "Admin" ,"admin" , "admin@liverfoundationpk.com" , "John Doe")


CREATE TABLE events(
    event_id varchar(10) NOT NULL,
    event_title varchar(200) NOT NULL,
    event_cover_path TEXT NOT NULL,
    event_content TEXT NOT NULL,
    user_name varchar(30) NOT NULL,
    event_add_date DATE NOT NULL,
    event_update_date DATE NOT NULL,
    PRIMARY KEY(event_id),
    FOREIGN KEY (user_name) REFERENCES users(user_name)
)



CREATE TABLE gallery(
    gallery_id varchar(10) NOT NULL,
    gallery_image_path TEXT NOT NULL,
    event_id varchar(10) NOT NULL,
    PRIMARY KEY (gallery_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
)






CREATE TABLE doctors(
    doctors_id varchar(10) NOT NULL,
    doctors_number INT NOT NULL,
    PRIMARY KEY (doctors_id)
)

INSERT INTO doctors VALUES("doc101",30)





CREATE TABLE stats(
    stats_year varchar(4) NOT NULL,
    stats_month varchar(12) NOT NULL,
    stats_patients_treated SMALLINT NOT NULL,
    stats_camps_conducted TINYINT NOT NULL,
    PRIMARY KEY (stats_year , stats_month)
)


CREATE  TABLE remarks(
    remark_id varchar(10) NOT NULL,
    remark_patient_name varchar(50) NOT NULL,
    remark_patient_feedback varchar(100) NOT NULL,
    remark_patient_image_path TEXT NOT NULL,
    event_id varchar(10) NOT NULL,
    PRIMARY KEY (remark_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
)




CREATE  TABLE finance(
    finance_id varchar(10) NOT NULL,
    finance_trust_receipts INT NOT NULL,
    finance_cinic_receipts INT NOT NULL,
    finance_trust_operations INT NOT NULL,
    finance_cinic_operations INT NOT NULL,
    PRIMARY KEY (finance_id)
)



