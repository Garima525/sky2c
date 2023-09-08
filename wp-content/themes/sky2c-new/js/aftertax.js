// JavaScript Document
/***************************
(c) 2008 www.TUFaT.com
All Rights Reserved. Please
do not re-sell/re-distribute
this software.
***************************/
function floor(number)
{
  return Math.floor(number*Math.pow(10,2))/Math.pow(10,2);
}

function dosum()
{
  var alltax = floor(document.temps.FT.value) + floor(document.temps.ST.value);
  var erate = document.temps.IR.value * (100 - alltax) / 100;
  var eyield = document.temps.YR.value * (100 - alltax) / 100;
  document.temps.ER.value = erate;
  document.temps.EY.value = eyield;
  document.temps.PY.value = document.temps.YR.value;
}

