<?php

class m151013_035602_news_add extends CDbMigration
{
	public function safeUp()
	{
            $this->execute("INSERT INTO `da_menu` (`visible`, `sequence`, `go_to_type`, `removable`, `name`, `caption`, `alias`, `external_link`, `id_module_template`) VALUES (1, 1, 1, 0, 'Новости', 'Новости', 'news', '/news/', 6);");
            $this->execute("UPDATE `da_php_script_type` SET `id_php_script_type`='1005', `file_path`='news.widgets.news.NewsWidget', `description`='Новости » Список последних на главной', `id_php_script_interface`=2, `active`=1 WHERE -`da_php_script_type`.`id_php_script_type`='1005';");
            $this->execute("INSERT INTO `da_php_script` (`id_php_script_type`, `params_value`) VALUES ('1005', 'a:1:{s:7:\"maxNews\";i:3;}');");
            $this->execute("INSERT INTO `da_site_module` (`is_visible`, `id_php_script`, `name`) VALUES (1, 1030, 'Последние новости');");
            $this->execute("INSERT INTO `da_site_module_rel` (`place`, `sequence`, `id_module`, `id_module_template`) VALUES (1, 1, 128, 1);");
            $this->execute("INSERT INTO `da_site_module_rel` (`place`, `sequence`, `id_module`, `id_module_template`) VALUES (5, 1, 128, 4);");
            $this->execute("INSERT INTO `da_auth_item` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('list_object_502', 0, 'Просмотр списка данных объекта Новости', NULL, 'N;');");
            $this->execute("INSERT INTO `da_auth_item_child` (`parent`, `child`) VALUES ('editor', 'list_object_502');");
            $this->execute('UPDATE `da_plugin` SET `id_plugin`=5, `name`="Новости", `code`="ygin.news", `status`=2, `config`=\'a:1:{s:7:"modules";a:1:{s:9:"ygin.news";a:1:{s:14:"showCategories";b:0;}}}\', `class_name`=\'ygin.modules.news.NewsPlugin\', `data`=\'a:8:{s:25:"id_php_script_type_module";i:1005;s:37:"id_php_script_type_module_param_count";i:1002;s:17:"id_sysytem_module";i:1002;s:9:"id_object";i:502;s:18:"id_object_category";i:503;s:23:"id_menu_module_template";s:1:"6";s:7:"id_menu";s:3:"120";s:14:"id_site_module";s:3:"128";}\' WHERE `da_plugin`.`id_plugin`=5;');

            $this->execute("UPDATE `da_object_view_column` SET `visible`=0 WHERE `da_object_view_column`.`id_object_view_column`='6004';");

            $this->execute("INSERT INTO `da_object_parameters` (`id_parameter_type`, `sequence`, `not_null`, `need_locale`, `search`, `is_additional`, `visible`, `id_object`, `group_type`, `caption`, `field_name`, `widget`, `add_parameter`, `sql_parameter`, `default_value`, `is_unique`, `hint`, `id_parameter`) VALUES (13, 0, 0, 0, 0, 0, 1, '502', 0, 'п/п', 'sequence', NULL, NULL, NULL, NULL, 0, '', '502-sequence');");
            $this->execute("ALTER TABLE `pr_news` ADD `sequence` INT(8) COMMENT  'п/п';");
            $this->execute("UPDATE da_object_parameters SET sequence = 351 WHERE id_parameter='502-sequence';");

            $this->execute("UPDATE `da_object_view` SET `id_object_view`='2002', `id_object`='502', `name`='Новости', `order_no`=1, `visible`=1, `sql_select`=NULL, `sql_from`=NULL, `sql_where`=NULL, `sql_order_by`='sequence ASC', `count_data`=50, `icon_class`='glyphicon glyphicon-bullhorn', `id_parent`=NULL, `description`='' WHERE `da_object_view`.`id_object_view`='2002';");
            $this->execute("UPDATE `da_menu` SET `id`=120, `name`='Новости', `caption`='Новости', `content`='', `visible`=1, `id_parent`=NULL, `sequence`=1, `note`=NULL, `alias`='news', `title_teg`=NULL, `meta_description`=NULL, `meta_keywords`=NULL, `go_to_type`=1, `id_module_template`=1, `external_link`='/news/', `external_link_type`=0, `removable`=0, `image`=NULL WHERE `da_menu`.`id`=120;");
            $this->execute("INSERT INTO da_search_data(id_object, id_instance, id_lang, value) VALUES('ygin-menu', '120', 1, 'Новости Новости');");

            $this->execute("UPDATE `da_menu` SET `id`=120, `name`='Новости', `caption`='Новости', `content`='', `visible`=1, `id_parent`=NULL, `sequence`=1, `note`=NULL, `alias`='news', `title_teg`=NULL, `meta_description`=NULL, `meta_keywords`=NULL, `go_to_type`=1, `id_module_template`=1, `external_link`='/news/', `external_link_type`=0, `removable`=0, `image`=NULL WHERE `da_menu`.`id`=120;");
            $this->execute(" UPDATE da_search_data SET value='Новости Новости' WHERE id_object='ygin-menu' AND id_instance='120' AND id_lang=1;");
         
    }

	public function down()
	{
		echo "m151013_035602_news_add does not support migration down.\n";
		return false;
	}

}