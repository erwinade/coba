<body bgcolor="#CCCCCC">
<h2><p align="center">TAMBAH DATA</p></h2>
<form method="post" action="aksi.php">
<table width="546" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
  <!--DWLayoutTable-->
  <tr>
    <td width="189" height="20"> </td>
    <td width="26"> </td>
    <td width="331"> </td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Id Sensor</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="id_sensor" type="text" size="10">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Nama Sensor</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input type="text" name="name_sensor">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Protokol</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <select name="protokol">
                <option selected="selected">--Pilih--</option>
                <option>snmpget</option>
                <option>modpoll</option>
                <option>BACNET</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Versi</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <select name="versi">
                <option selected="selected">--Pilih--</option>
                <option>v1</option>
                <option>v2c</option>
                <option>v3</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Rocomunity</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="rocomunity" type="text" size="50">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">IP Device</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="ip" type="text" size="50">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">MIB Name</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="mib_name" type="text" size="50">
    </label></td>
  </tr>
  <tr>
    <td height="42"> </td>
    <td> </td>
    <td><input type="submit" name="ttambah" value="TAMBAH"></td>
  </tr>

</table>
</form>
</body>
