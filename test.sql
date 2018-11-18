CREATE TABLE IF NOT EXISTS news(
	news_id bigint unsigned NOT NULL AUTO_INCREMENT,
	news_title varchar(50) DEFAULT NULL,
	news_details text,
	news_image_location varchar(500) DEFAULT NULL,
	news_active tinyint DEFAULT '1',
	news_created_date_time DATETIME DEFAULT NULL,
	news_created_edited_date_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY(news_id)
	
	)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;