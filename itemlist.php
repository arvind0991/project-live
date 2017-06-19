
<?php
$requestXML = '<?xml version="1.0"?><ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>
<BODY>
<IMPORTDATA>
<REQUESTDESC>
<REPORTNAME>All Masters</REPORTNAME>
</REQUESTDESC>
<REQUESTDATA>
<TALLYMESSAGE xmlns:UDF="TallyUDF">
<STOCKITEM NAME="Item1" ACTION="Create">
<PARENT>Components</PARENT>
<CATEGORY>Consumables</CATEGORY>
<TAXCLASSIFICATIONNAME />
<COSTINGMETHOD>Avg. Cost</COSTINGMETHOD>
<VALUATIONMETHOD>Avg. Price</VALUATIONMETHOD>
<BASEUNITS>Nos</BASEUNITS>
<ADDITIONALUNITS />
<DESCRIPTION>Old</DESCRIPTION>
<EXCISEITEMCLASSIFICATION>Default</EXCISEITEMCLASSIFICATION>
<REORDERPERIOD>Days</REORDERPERIOD>
<MINORDERPERIOD>Days</MINORDERPERIOD>
<ISCOSTCENTRESON>No</ISCOSTCENTRESON>
<ISBATCHWISEON>Yes</ISBATCHWISEON>
<ISPERISHABLEON>Yes</ISPERISHABLEON>
<ISENTRYTAXAPPLICABLE>No</ISENTRYTAXAPPLICABLE>
<ISCOSTTRACKINGON>No</ISCOSTTRACKINGON>
<IGNOREPHYSICALDIFFERENCE>No</IGNOREPHYSICALDIFFERENCE>
<IGNORENEGATIVESTOCK>No</IGNORENEGATIVESTOCK>
<TREATSALESASMANUFACTURED>No</TREATSALESASMANUFACTURED>
<TREATPURCHASESASCONSUMED>No</TREATPURCHASESASCONSUMED>
<TREATREJECTSASSCRAP>No</TREATREJECTSASSCRAP>
<HASMFGDATE>Yes</HASMFGDATE>
<ALLOWUSEOFEXPIREDITEMS>No</ALLOWUSEOFEXPIREDITEMS>
<IGNOREBATCHES>No</IGNOREBATCHES>
<IGNOREGODOWNS>No</IGNOREGODOWNS>
<CALCONMRP>No</CALCONMRP>
<EXCLUDEJRNLFORVALUATION>No</EXCLUDEJRNLFORVALUATION>
<ISMRPINCLOFTAX>No</ISMRPINCLOFTAX>
<ISADDLTAXEXEMPT>No</ISADDLTAXEXEMPT>
<ISSUPPLEMENTRYDUTYON>No</ISSUPPLEMENTRYDUTYON>
<REORDERASHIGHER>Yes</REORDERASHIGHER>
<MINORDERASHIGHER>Yes</MINORDERASHIGHER>
<DENOMINATOR>1</DENOMINATOR>
<RATEOFVAT>0</RATEOFVAT>
<REORDERPERIODLENGTH>5</REORDERPERIODLENGTH>
<MINORDERPERIODLENGTH>5</MINORDERPERIODLENGTH>
<OPENINGBALANCE>100 Nos</OPENINGBALANCE>
<OPENINGVALUE>-10000.00</OPENINGVALUE>
<REORDERBASE>10 Nos</REORDERBASE>
<MINIMUMORDERBASE>5 Nos</MINIMUMORDERBASE>
<OPENINGRATE>100.00/Nos</OPENINGRATE>
<LANGUAGENAME.LIST>
<NAME.LIST TYPE="String">
<NAME>Item1</NAME>
</NAME.LIST>
<LANGUAGEID>1033</LANGUAGEID>
</LANGUAGENAME.LIST>
<AUDITENTRIES.LIST />
<COMPONENTLIST.LIST />
<ADDITIONALLEDGERS.LIST />
<SALESLIST.LIST />
<PURCHASELIST.LIST />
<FULLPRICELIST.LIST />
<BATCHALLOCATIONS.LIST>
<MFDON>20110401</MFDON>
<GODOWNNAME>Your Godown</GODOWNNAME>
<BATCHNAME>Batch1</BATCHNAME>
<OPENINGBALANCE>100 Nos</OPENINGBALANCE>
<OPENINGVALUE>-10000.00</OPENINGVALUE>
<OPENINGRATE>100.00/Nos</OPENINGRATE>
<EXPIRYPERIOD>1-Dec-2011</EXPIRYPERIOD>
</BATCHALLOCATIONS.LIST>
<TRADEREXCISEDUTIES.LIST />
<STANDARDCOSTLIST.LIST />
<STANDARDPRICELIST.LIST />
<EXCISEITEMGODOWN.LIST />
<MULTICOMPONENTLIST.LIST />
<PRICELEVELLIST.LIST />
</STOCKITEM>
</TALLYMESSAGE>
</REQUESTDATA>
</IMPORTDATA>
</BODY>
</ENVELOPE> ';
?>

  $server = 'http://quytech.ddns.net:8000/';
    $headers = array( "Content-type: text/xml" ,"Content-length: ".strlen($requestXML) ,"Connection: close" );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 400);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $data = curl_exec($ch);
   
//die;
    if(curl_errno($ch)){
      print curl_error($ch);
      echo "  something went wrong..... try later";
    }else{
      echo " request accepted";
      print $data;
      curl_close($ch);
    }