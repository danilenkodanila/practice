<?php
session_start();
if (empty($_SESSION['email']) or empty($_SESSION['password'])) 
{
//���� �� ���������� ������ � ������� � �������, ������ �� ���� ���� ����� ���������� ������������. ��� ��� �� �����. ������ ��������� �� ������, ������������� ������
exit ("������ �� ��� �������� �������� ������ ������������������ �������������. ���� �� ����������������, �� ������� �� ���� ��� ����� ������� � �������<br><a href='employers-list.php'>������� ��������</a>");
}

unset($_SESSION['password']);
unset($_SESSION['email']); 
unset($_SESSION['id']);
unset($_SESSION['category']);// ���������� ���������� � �������

exit("<html><head><meta http-equiv='Refresh' content='0; URL=employers-list.php'></head></html>");

// ���������� ������������ �� ������� ��������.
?>