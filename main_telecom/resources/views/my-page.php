<!DOCTYPE html>

<?php
$connect = mysqli_connect("localhost", "root", "", "vtiger");
$query = "SELECT `vtiger_products`.`productid` as productid FROM `vtiger_products`";
$result = mysqli_query($connect, $query);


?>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="last.css">

</head>
<body>
   <div>
    <h1>Main Telecom 7 p's</h1>
    <br>
    <div class='vertical-align'>
    <div class='btns'>
      <label>
        <input checked='' name='button-group' type='checkbox' value='item'>
          <span class='btn first'>Product</span>
        </input>
      </label>
      <label>
        <input name='button-group' type='checkbox' value='other-item'>
          <span class='btn'>Price</span>
        </input>
      </label>
      <label>
        <input name='button-group' type='checkbox' value='other-item'>
          <span class='btn'>People</span>
        </input>
      </label>
      <label>
        <input name='button-group' type='checkbox' value='third'>
          <span class='btn'>Promotion</span>
        </input>
      </label>
      <label>
        <input name='button-group' type='checkbox' value='third'>
          <span class='btn last'>Place</span>
        </input>
      </label>

    </div>
  </div>
 <div class="mommy">
  <div class="daddy">
   <!-- <button class ="1">1</button>
    <button class ="2">2</button>
    <button class ="3">3</button>
    <button class ="4">4</button>
    <button class ="5">5</button>
    <button class ="6">6</button>
    <button class ="7">7</button>
    <button class ="8">8</button>
    <button class ="9">9</button>
    <button class ="10">10</button>
    <button class ="11">11</button>
    <button class ="12">12</button>
    <button class ="13">13</button>
    <button class ="14">14</button>
    <button class ="15">15</button>
    <button class ="16">16</button>
    <button class ="17">17</button>
    <button class ="18">18</button>
    <button class ="19">19</button>
    <button class ="20">20 </button>
    <button class ="21">21 </button>
    <button class ="22">22 </button>
    <button class ="23">23 </button>
    <button class ="24">24 </button>
    <button class ="25">25 </button>
    <button class ="26">26 </button>
    <button class ="27">27 </button>
    <button class ="28">28 </button>
    <button class ="29">29 </button>
    <button class ="30">30 </button>
    <button class ="31">31 </button>
    <button class ="32">32 </button>
    <button class ="33">33 </button>
    <button class ="34">34 </button>
    <button class ="35">35</button>
    <button class ="36">36 </button>
    <button class ="37">37 </button>
    <button class ="38">38 </button>
    <button class ="39">39 </button>
    <button class ="40">40 </button>
    <button class ="41">41</button>
    <button class ="42">42 </button>
    <button class ="43">43</button>
    <button class ="44">44 </button>
    <button class ="45">45</button>
    <button class ="46">46 </button>
    <button class ="47">47</button>
    <button class ="48">48 </button>
    <button class ="49">49</button>
    <button class ="50">50 </button>
    <button class ="51">51</button>
    <button class ="52">52 </button>
    <button class ="53">53</button>
    <button class ="54">54 </button>
    <button class ="55">55</button>
    <button class ="56">56 </button>
    <button class ="57">57</button>
    <button class ="58">58 </button>
    <button class ="59">59</button>
    <button class ="60">60 </button>
    <button class ="61">61</button>
    <button class ="62">62 </button>
    <button class ="63">63</button>
    <button class ="64">64 </button>
    <button class ="65">65</button>
    <button class ="66">66 </button>
    <button class ="67">67</button>
    <button class ="68">68 </button>
    <button class ="69">69</button>
    <button class ="70">70 </button>
    <button class ="71">71</button>
    <button class ="72">72 </button>
    <button class ="73">73</button>
    <button class ="74">74 </button>
    <button class ="75">75</button>
    <button class ="76">76 </button>
    <button class ="77">77</button>
    <button class ="78">78 </button>
    <button class ="79">79</button>
    <button class ="80">80 </button>
    <button class ="81">81</button>
    <button class ="82">82 </button>
    <button class ="83">83</button>
    <button class ="84">84 </button>
    <button class ="85">85</button>
    <button class ="86">86 </button>
    <button class ="87">87</button>
    <button class ="88">88 </button>
    <button class ="89">89</button>
    <button class ="90">90 </button>
    <button class ="91">91</button>
    <button class ="92">92 </button>
    <button class ="93">93</button>
    <button class ="94">94 </button>
    <button class ="95">95</button>
    <button class ="96">96 </button>
    <button class ="97">97</button>
    <button class ="98">98 </button>
    <button class ="99">99</button>
    <button class ="100">100 </button>
    <button class ="101">101</button>
    <button class ="102">102 </button>
    <button class ="103">103</button>
    <button class ="104">104 </button>
    <button class ="105">105</button>
    <button class ="106">106 </button>
    <button class ="107">107</button>
    <button class ="108">108 </button>
    <button class ="109">109</button>
    <button class ="110">110 </button>
    <button class ="111">111</button>
    <button class ="112">112 </button>
    <button class ="113">113</button>
    <button class ="114">114 </button>
    <button class ="115">115</button>
    <button class ="116">116 </button>
    <button class ="117">117</button>
    <button class ="118">118 </button>
    <button class ="119">119</button> -->
		<?php

    while($row = mysqli_fetch_array($result))
        {
             echo "<button class =1>".$row["productid"]."</button>";

        }

		 ?>

  </div>
</div>
</body>
</html>
