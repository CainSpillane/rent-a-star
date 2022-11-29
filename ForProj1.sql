



USE site_db;


-- INSERT INTO t8_stars (star_id, star_name, star_declination, star_distance, star_right_ascension)
-- VALUES ('2', "Leo", '15', '500', '10:30:00');

INSERT INTO t8_stars (star_id, star_name, star_declination, star_distance, star_right_ascension)
VALUES ('3', "Gemini", '22', '501', '07:00:00');

INSERT INTO t8_stars (star_id, star_name, star_declination, star_distance, star_right_ascension)
VALUES ('4', "Draco", '62', '502', '17:00:00');

INSERT INTO t8_stars (star_id, star_name, star_declination, star_distance, star_right_ascension)
VALUES ('5', "Ursa Major", '55.38', '503', '10:40:02');

INSERT INTO t8_stars (star_id, star_name, star_declination, star_distance, star_right_ascension)
VALUES ('6', "Copernicus", '28', '504', '8:52:40');


-- INSERT INTO t8_trans_history (trans_id, star_id, u_id, card_info, trans_value, date_processed)
-- VALUES ('2', '2', '2', '11111110', '98.23' , CURRENT_TIMESTAMP);

INSERT INTO t8_trans_history (trans_id, star_id, u_id, card_info, trans_value, date_processed)
VALUES ('3', '3', '3', '11111111', '62.71' , CURRENT_TIMESTAMP);

INSERT INTO t8_trans_history (trans_id, star_id, u_id, card_info, trans_value, date_processed)
VALUES ('4', '4', '4', '11111112', '73.45' , CURRENT_TIMESTAMP);

INSERT INTO t8_trans_history (trans_id, star_id, u_id, card_info, trans_value, date_processed)
VALUES ('5', '5', '5', '11111113', '12.39' , CURRENT_TIMESTAMP);

INSERT INTO t8_trans_history (trans_id, star_id, u_id, card_info, trans_value, date_processed)
VALUES ('6', '6', '6' '11111114', '38.27' , CURRENT_TIMESTAMP);