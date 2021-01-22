<body bgcolor="#CCCCCC">
<h2><p align="center">TAMBAH DATA</p></h2>
<form method="post" action="aksi_modbus.php">
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
    <td height="27" align="right" valign="middle">Function</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input type="text" name="fungsi">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Address</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <select name="alamt">
                <option selected="selected">--Pilih--</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Register</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="register" type="text" size="50">
    </label></td>
  </tr>
  <tr>
    <td height="27" align="right" valign="middle">Offset</td>
    <td align="center" valign="top">:</td>
    <td valign="middle"><label>
      <input name="jumlah" type="text" size="50">
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
    <td height="42"> </td>
    <td> </td>
    <td><input type="submit" name="tambahmodbus" value="TAMBAH"></td>
  </tr>

</table>
</form>
</body>
