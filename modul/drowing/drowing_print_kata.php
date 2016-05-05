<?php
	for($i=1; $i<=31; $i++)
	{
		// ${no_tanding_.$i} = $i; Sudah di Set
		${nama_ke_.$i} = substr(${nama_ke_.$i},0,15); 			 // 15 CharMax
		${kontingen_ke_.$i} = substr(${kontingen_ke_.$i},0,24); //22 CharMax

		${nama_ke_.$i} = ucwords(strtolower(${nama_ke_.$i})); 	// Ubah jadi lower lalu title Case
		${kontingen_ke_.$i} = ucwords(strtolower(${kontingen_ke_.$i})); 	// Ubah jadi lower lalu title Case

	} // close for $i
?>

<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<link rel="stylesheet" href="drowing_print_kata.css">
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
<div align="center">
	<div class="row">
		<span class="hide-print">
			<br><br>
      <h2 class="text-center">NOTE: Hasil print optimal menggunakan Chome Versi 49 keatas.
        <br><br>
        <small>
        <?php echo $kelas; ?> 
        <br> Pool : <?php echo $pool_get; ?>
        </small>
      </h2> 			
			<a href="#" onclick="history.back()" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-chevron-left"></span>  Kembali</a>
      <?php echo $edit_link; ?>
			<a href="#" onclick="print()" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-print"></span>  Print</a>
		</span>
	</div>
</div>

<table border=0 cellpadding=0 cellspacing=0 width=2099 class=xl642673
 style='border-collapse:collapse;table-layout:fixed;width:1578pt'>
 <col class=xl642673 width=32 style='mso-width-source:userset;mso-width-alt:
 1170;width:24pt'>
 <col class=xl642673 width=133 style='mso-width-source:userset;mso-width-alt:
 4864;width:100pt'>
 <col class=xl642673 width=190 style='mso-width-source:userset;mso-width-alt:
 6948;width:143pt'>
 <col class=xl642673 width=36 span=2 style='mso-width-source:userset;
 mso-width-alt:1316;width:27pt'>
 <col class=xl642673 width=136 style='mso-width-source:userset;mso-width-alt:
 4973;width:102pt'>
 <col class=xl642673 width=208 style='mso-width-source:userset;mso-width-alt:
 7606;width:156pt'>
 <col class=xl642673 width=35 style='mso-width-source:userset;mso-width-alt:
 1280;width:26pt'>
 <col class=xl642673 width=37 style='mso-width-source:userset;mso-width-alt:
 1353;width:28pt'>
 <col class=xl642673 width=138 style='mso-width-source:userset;mso-width-alt:
 5046;width:104pt'>
 <col class=xl642673 width=181 style='mso-width-source:userset;mso-width-alt:
 6619;width:136pt'>
 <col class=xl642673 width=32 style='mso-width-source:userset;mso-width-alt:
 1170;width:24pt'>
 <col class=xl642673 width=38 style='mso-width-source:userset;mso-width-alt:
 1389;width:29pt'>
 <col class=xl642673 width=136 style='mso-width-source:userset;mso-width-alt:
 4973;width:102pt'>
 <col class=xl642673 width=157 style='mso-width-source:userset;mso-width-alt:
 5741;width:118pt'>
 <col class=xl642673 width=30 style='mso-width-source:userset;mso-width-alt:
 1097;width:23pt'>
 <col class=xl642673 width=36 style='mso-width-source:userset;mso-width-alt:
 1316;width:27pt'>
 <col class=xl642673 width=139 style='mso-width-source:userset;mso-width-alt:
 5083;width:104pt'>
 <col class=xl642673 width=136 style='mso-width-source:userset;mso-width-alt:
 4973;width:102pt'>
 <col class=xl642673 width=37 style='mso-width-source:userset;mso-width-alt:
 1353;width:28pt'>
 <col class=xl642673 width=94 style='mso-width-source:userset;mso-width-alt:
 3437;width:71pt'>
 <col class=xl642673 width=102 style='mso-width-source:userset;mso-width-alt:
 3730;width:77pt'>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl632673 width=32 style='height:15.95pt;width:24pt'>&nbsp;</td>
  <td class=xl632673 width=133 style='width:100pt'>&nbsp;</td>
  <td class=xl632673 width=190 style='width:143pt'>&nbsp;</td>
  <td class=xl632673 width=36 style='width:27pt'>&nbsp;</td>
  <td class=xl632673 width=36 style='width:27pt'>&nbsp;</td>
  <td class=xl632673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl632673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl632673 width=35 style='width:26pt'>&nbsp;</td>
  <td class=xl632673 width=37 style='width:28pt'>&nbsp;</td>
  <td class=xl632673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl632673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl632673 width=32 style='width:24pt'>&nbsp;</td>
  <td class=xl632673 width=38 style='width:29pt'>&nbsp;</td>
  <td class=xl632673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl632673 width=157 style='width:118pt'>&nbsp;</td>
  <td class=xl632673 width=30 style='width:23pt'>&nbsp;</td>
  <td class=xl632673 width=36 style='width:27pt'>&nbsp;</td>
  <td class=xl632673 width=139 style='width:104pt'>&nbsp;</td>
  <td class=xl632673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl632673 width=30 style='width:23pt'>&nbsp;</td>
  <td class=xl632673 width=94 style='width:71pt'>&nbsp;</td>
  <td class=xl632673 width=102 style='width:77pt'>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_1;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_1;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_1;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl732673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td rowspan=2 class=xl742673><?php echo $no_tanding_17;?></td>
  <td class=xl752673 width=136 style='border-left:none;width:102pt'><?php echo $nama_ke_17;?></td>
  <td class=xl762673 width=208 style='border-left:none;width:156pt'><?php echo $kontingen_ke_17;?></td>
  <td class=xl662673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=344 style='border-right:.5pt solid black;
  border-left:none;width:258pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=6 rowspan=2 class=xl672673 style='font:bold 3em arial;'><?php echo $kelas; ?></td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_2;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_2;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_2;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl792673 style='border-top:none'>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl812673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td rowspan=2 class=xl832673><?php echo $no_tanding_28;?></td>
  <td class=xl752673 width=138 style='border-left:none;width:104pt'><?php echo $nama_ke_28;?></td>
  <td class=xl762673 width=181 style='border-left:none;width:136pt'><?php echo $kontingen_ke_28;?></td>
  <td class=xl662673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td colspan=4 class=xl842673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl812673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=319 style='border-right:.5pt solid black;
  border-left:none;width:240pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_3;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_3;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_3;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl862673>&nbsp;</td>
  <td class=xl872673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl872673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl882673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl732673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td rowspan=2 class=xl742673 style='border-top:none'><?php echo $no_tanding_18;?></td>
  <td class=xl752673 width=136 style='border-top:none;border-left:none;
  width:102pt'><?php echo $nama_ke_18;?></td>
  <td class=xl762673 width=208 style='border-top:none;border-left:none;
  width:156pt'><?php echo $kontingen_ke_18;?></td>
  <td class=xl662673 style='border-top:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=344 style='border-right:.5pt solid black;
  border-left:none;width:258pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_4;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_4;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_4;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl892673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl812673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl812673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl1042673>POOL : <?php echo $pool_get; ?></td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl902673 style='border-left:none'>&nbsp;</td>
  <td class=xl912673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl912673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td rowspan=2 class=xl742673><?php echo $no_tanding_29;?></td>
  <td class=xl752673 width=136 style='border-left:none;width:102pt'><?php echo $nama_ke_29;?></td>
  <td class=xl762673 width=157 style='border-left:none;width:118pt'><?php echo $kontingen_ke_29;?></td>
  <td class=xl662673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl812673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=293 style='border-right:.5pt solid black;
  border-left:none;width:220pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_5;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_5;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_5;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl912673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl912673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl922673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td rowspan=2 class=xl742673><?php echo $no_tanding_19;?></td>
  <td class=xl752673 width=136 style='border-left:none;width:102pt'><?php echo $nama_ke_19;?></td>
  <td class=xl762673 width=208 style='border-left:none;width:156pt'><?php echo $kontingen_ke_19;?></td>
  <td class=xl662673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=344 style='border-right:.5pt solid black;
  border-left:none;width:258pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_6;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_6;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_6;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl792673 style='border-top:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl932673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td rowspan=2 class=xl832673><?php echo $no_tanding_27;?></td>
  <td class=xl752673 width=138 style='border-left:none;width:104pt'><?php echo $nama_ke_27;?></td>
  <td class=xl762673 width=181 style='border-left:none;width:136pt'><?php echo $kontingen_ke_27;?></td>
  <td class=xl662673 style='border-top:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl812673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=319 style='border-right:.5pt solid black;
  border-left:none;width:240pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_7;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_7;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_7;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl862673>&nbsp;</td>
  <td class=xl872673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl872673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl882673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td rowspan=2 class=xl742673 style='border-top:none'><?php echo $no_tanding_20;?></td>
  <td class=xl752673 width=136 style='border-top:none;border-left:none;
  width:102pt'><?php echo $nama_ke_20;?></td>
  <td class=xl762673 width=208 style='border-top:none;border-left:none;
  width:156pt'><?php echo $kontingen_ke_20;?></td>
  <td class=xl662673 style='border-top:none'>&nbsp;</td>
  <td class=xl902673 style='border-left:none'>&nbsp;</td>
  <td class=xl812673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl812673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=344 style='border-right:.5pt solid black;
  border-left:none;width:258pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl902673 style='border-left:none'>&nbsp;</td>
  <td class=xl912673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl912673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_8;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_8;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_8;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl892673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl812673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl812673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl902673 style='border-left:none'>&nbsp;</td>
  <td class=xl912673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl912673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl812673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td rowspan=2 class=xl742673><?php echo $no_tanding_31;?></td>
  <td class=xl752673 width=139 style='border-left:none;width:104pt'><?php echo $nama_ke_31;?></td>
  <td class=xl762673 width=136 style='border-left:none;width:102pt'><?php echo $kontingen_ke_31;?></td>
  <td class=xl662673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl912673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl912673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl952673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=275 style='border-right:.5pt solid black;
  border-left:none;width:206pt'>&nbsp;</td>
  <td class=xl662673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_9;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_9;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_9;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl952673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl732673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td rowspan=2 class=xl742673><?php echo $no_tanding_21;?></td>
  <td class=xl752673 width=136 style='border-left:none;width:102pt'><?php echo $nama_ke_21;?></td>
  <td class=xl762673 width=208 style='border-left:none;width:156pt'><?php echo $kontingen_ke_21;?></td>
  <td class=xl662673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=344 style='border-right:.5pt solid black;
  border-left:none;width:258pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_10;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_10;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_10;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl792673 style='border-top:none'>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl812673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td rowspan=2 class=xl832673><?php echo $no_tanding_26;?></td>
  <td class=xl752673 width=138 style='border-left:none;width:104pt'><?php echo $nama_ke_26;?></td>
  <td class=xl762673 width=181 style='border-left:none;width:136pt'><?php echo $kontingen_ke_26;?></td>
  <td class=xl662673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl812673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=319 style='border-right:.5pt solid black;
  border-left:none;width:240pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_11;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_11;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_11;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl862673>&nbsp;</td>
  <td class=xl872673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl872673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl882673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl792673 style='border-top:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td rowspan=2 class=xl742673 style='border-top:none'><?php echo $no_tanding_22;?></td>
  <td class=xl752673 width=136 style='border-top:none;border-left:none;
  width:102pt'><?php echo $nama_ke_22;?></td>
  <td class=xl762673 width=208 style='border-top:none;border-left:none;
  width:156pt'><?php echo $kontingen_ke_22;?></td>
  <td class=xl662673 style='border-top:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl672673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=344 style='border-right:.5pt solid black;
  border-left:none;width:258pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_12;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_12;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_12;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl952673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl962673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td rowspan=2 class=xl742673><?php echo $no_tanding_30;?></td>
  <td class=xl752673 width=136 style='border-left:none;width:102pt'><?php echo $nama_ke_30;?></td>
  <td class=xl762673 width=157 style='border-left:none;width:118pt'><?php echo $kontingen_ke_30;?></td>
  <td class=xl662673 style='border-top:none'>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl812673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=293 style='border-right:.5pt solid black;
  border-left:none;width:220pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_13;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_13;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_13;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl912673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl912673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td rowspan=2 class=xl742673><?php echo $no_tanding_23;?></td>
  <td class=xl752673 width=136 style='border-left:none;width:102pt'><?php echo $nama_ke_23;?></td>
  <td class=xl762673 width=208 style='border-left:none;width:156pt'><?php echo $kontingen_ke_23;?></td>
  <td class=xl662673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl812673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl982673>Juara</td>
  <td class=xl972673>&nbsp;</td>
  <td colspan=3 class=xl1052673>Nama</td>
  <td align="right" class="xl1052673">Kontingen</td>
  <td class="xl942673">&nbsp;</td>
  <td class="xl942673">&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=344 style='border-right:.5pt solid black;
  border-left:none;width:258pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl912673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl912673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl922673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl982673>&nbsp;</td>
  <td class=xl972673>&nbsp;</td>
  <td class=xl972673>&nbsp;</td>
  <td class=xl982673>&nbsp;</td>
  <td class=xl972673>&nbsp;</td>
  <td class=xl972673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_14;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_14;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_14;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl812673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl792673 style='border-top:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl932673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl982673>1</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl912673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl912673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl922673>&nbsp;</td>
  <td rowspan=2 class=xl832673><?php echo $no_tanding_25;?></td>
  <td class=xl752673 width=138 style='border-left:none;width:104pt'><?php echo $nama_ke_25;?></td>
  <td class=xl762673 width=181 style='border-left:none;width:136pt'><?php echo $kontingen_ke_25;?></td>
  <td class=xl662673 style='border-top:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl982673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl772673>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl822673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=319 style='border-right:.5pt solid black;
  border-left:none;width:240pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl982673>2</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_15;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_15;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_15;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl932673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl982673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl632673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td rowspan=2 class=xl742673><?php echo $no_tanding_24;?></td>
  <td class=xl752673 width=136 style='border-left:none;width:102pt'><?php echo $nama_ke_24;?></td>
  <td class=xl762673 width=208 style='border-left:none;width:156pt'><?php echo $kontingen_ke_24;?></td>
  <td class=xl662673 style='border-top:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl982673>3</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl772673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td colspan=2 class=xl762673 width=344 style='border-right:.5pt solid black;
  border-left:none;width:258pt'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl982673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td rowspan=2 height=42 class=xl652673 style='border-bottom:.5pt solid black;
  height:31.9pt'><?php echo $no_tanding_16;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $nama_ke_16;?></td>
  <td class=xl662673 style='border-left:none'><?php echo $kontingen_ke_16;?></td>
  <td class=xl662673 style='border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl812673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl812673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl982673>3</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td colspan=2 height=21 class=xl712673 style='border-right:.5pt solid black;
  height:15.95pt;border-left:none'>&nbsp;</td>
  <td class=xl742673 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl802673>&nbsp;</td>
  <td class=xl912673 width=138 style='width:104pt'>&nbsp;</td>
  <td class=xl912673 width=181 style='width:136pt'>&nbsp;</td>
  <td class=xl852673>&nbsp;</td>
  <td class=xl672673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl942673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl682673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.95pt'>
  <td height=21 class=xl992673 style='height:15.95pt'>&nbsp;</td>
  <td class=xl992673>&nbsp;</td>
  <td class=xl992673>&nbsp;</td>
  <td class=xl1002673>&nbsp;</td>
  <td class=xl1012673>&nbsp;</td>
  <td class=xl1022673 width=136 style='width:102pt'>&nbsp;</td>
  <td class=xl1022673 width=208 style='width:156pt'>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl1032673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
  <td class=xl692673>&nbsp;</td>
 </tr>
</table>
</body>

</html>
