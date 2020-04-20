<?php
defined('_JEXEC') or die;

class modAngularjsHelper
{
    static function phoneNumbersAjax()
    {
        $dbo = JFactory::getDbo();
        $query =
            "SELECT * FROM #__address_book ORDER BY id DESC";

        $results = $dbo->setQuery($query)->loadObjectList();

        return $results;
    }

    static function insertPhoneNumberAjax()
    {
        if(!JSession::checkToken())
            throw new Exception('Invalid token');

        $input = JFactory::getApplication()->input;
        $name = $input->getString('name');
        $surname = $input->getString('surname');
        $phone_number = $input->getString('phone');
        
        $dbo = JFactory::getDbo();
        $query = "INSERT INTO #__address_book (name, surname, phone_number) VALUES ('$name', '$surname', '$phone_number')";
        $dbo->setQuery($query);
        $dbo->execute();
        return true;
    }
}

