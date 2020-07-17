<style>
  tfoot {
    display: table-header-group;
  }
</style>
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $countPegawai ?></h3>

          <p>Pegawai</p>
        </div>
        <div class="icon">
          <i class="fa fa-users" style="font-size:80%;"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $countCert; ?></h3>

          <p>Sertifikat</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-text-o" style="font-size:80%;"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $countFkapal ?></h3>

          <p>Foto Kapal</p>
        </div>
        <div class="icon">
          <i class="fa fa-picture-o" style="font-size:80%;"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><?= date('M'); ?></h3>

          <p>Bulan</p>
        </div>
        <div class="icon">
          <i class="fa fa-bar-chart" style="font-size:80%;"></i>
        </div>
      </div>
    </div>
    <!-- laporan -->
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Laporan Sertifikat Bulanan
          </h3>
        </div>
        <form action="">
          <div class="box-body">
            <table class="table table-bordered table-hover nowrap" style="width:100%" id="lapBulanan">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kapal</th>
                  <th>Nama Sertifikat</th>
                  <th>Uploaded By</th>
                  <th>Aksi</th>
                  <th>Test</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th rowspan="1" colspan="1">
                    <select class="mymsel select2-hidden-accessible" multiple="" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option value="" data-select2-id="16"></option>
                      <option value="Airi Satou" data-select2-id="17">Airi Satou</option>
                      <option value="Angelica Ramos" data-select2-id="18">Angelica Ramos</option>
                      <option value="Ashton Cox" data-select2-id="19">Ashton Cox</option>
                      <option value="Bradley Greer" data-select2-id="20">Bradley Greer</option>
                      <option value="Brenden Wagner" data-select2-id="21">Brenden Wagner</option>
                      <option value="Brielle Williamson" data-select2-id="22">Brielle Williamson</option>
                      <option value="Bruno Nash" data-select2-id="23">Bruno Nash</option>
                      <option value="Caesar Vance" data-select2-id="24">Caesar Vance</option>
                      <option value="Cara Stevens" data-select2-id="25">Cara Stevens</option>
                      <option value="Cedric Kelly" data-select2-id="26">Cedric Kelly</option>
                      <option value="Charde Marshall" data-select2-id="27">Charde Marshall</option>
                      <option value="Colleen Hurst" data-select2-id="28">Colleen Hurst</option>
                      <option value="Dai Rios" data-select2-id="29">Dai Rios</option>
                      <option value="Donna Snider" data-select2-id="30">Donna Snider</option>
                      <option value="Doris Wilder" data-select2-id="31">Doris Wilder</option>
                      <option value="Finn Camacho" data-select2-id="32">Finn Camacho</option>
                      <option value="Fiona Green" data-select2-id="33">Fiona Green</option>
                      <option value="Garrett Winters" data-select2-id="34">Garrett Winters</option>
                      <option value="Gavin Cortez" data-select2-id="35">Gavin Cortez</option>
                      <option value="Gavin Joyce" data-select2-id="36">Gavin Joyce</option>
                      <option value="Gloria Little" data-select2-id="37">Gloria Little</option>
                      <option value="Haley Kennedy" data-select2-id="38">Haley Kennedy</option>
                      <option value="Hermione Butler" data-select2-id="39">Hermione Butler</option>
                      <option value="Herrod Chandler" data-select2-id="40">Herrod Chandler</option>
                      <option value="Hope Fuentes" data-select2-id="41">Hope Fuentes</option>
                      <option value="Howard Hatfield" data-select2-id="42">Howard Hatfield</option>
                      <option value="Jackson Bradshaw" data-select2-id="43">Jackson Bradshaw</option>
                      <option value="Jena Gaines" data-select2-id="44">Jena Gaines</option>
                      <option value="Jenette Caldwell" data-select2-id="45">Jenette Caldwell</option>
                      <option value="Jennifer Acosta" data-select2-id="46">Jennifer Acosta</option>
                      <option value="Jennifer Chang" data-select2-id="47">Jennifer Chang</option>
                      <option value="Jonas Alexander" data-select2-id="48">Jonas Alexander</option>
                      <option value="Lael Greer" data-select2-id="49">Lael Greer</option>
                      <option value="Martena Mccray" data-select2-id="50">Martena Mccray</option>
                      <option value="Michael Bruce" data-select2-id="51">Michael Bruce</option>
                      <option value="Michael Silva" data-select2-id="52">Michael Silva</option>
                      <option value="Michelle House" data-select2-id="53">Michelle House</option>
                      <option value="Olivia Liang" data-select2-id="54">Olivia Liang</option>
                      <option value="Paul Byrd" data-select2-id="55">Paul Byrd</option>
                      <option value="Prescott Bartlett" data-select2-id="56">Prescott Bartlett</option>
                      <option value="Quinn Flynn" data-select2-id="57">Quinn Flynn</option>
                      <option value="Rhona Davidson" data-select2-id="58">Rhona Davidson</option>
                      <option value="Sakura Yamamoto" data-select2-id="59">Sakura Yamamoto</option>
                      <option value="Serge Baldwin" data-select2-id="60">Serge Baldwin</option>
                      <option value="Shad Decker" data-select2-id="61">Shad Decker</option>
                      <option value="Shou Itou" data-select2-id="62">Shou Itou</option>
                      <option value="Sonya Frost" data-select2-id="63">Sonya Frost</option>
                      <option value="Suki Burks" data-select2-id="64">Suki Burks</option>
                      <option value="Tatyana Fitzpatrick" data-select2-id="65">Tatyana Fitzpatrick</option>
                      <option value="Thor Walton" data-select2-id="66">Thor Walton</option>
                      <option value="Tiger Nixon" data-select2-id="67">Tiger Nixon</option>
                      <option value="Timothy Mooney" data-select2-id="68">Timothy Mooney</option>
                      <option value="Unity Butler" data-select2-id="69">Unity Butler</option>
                      <option value="Vivian Harrell" data-select2-id="70">Vivian Harrell</option>
                      <option value="Yuri Berry" data-select2-id="71">Yuri Berry</option>
                      <option value="Zenaida Frank" data-select2-id="72">Zenaida Frank</option>
                      <option value="Zorita Serrano" data-select2-id="73">Zorita Serrano</option>
                    </select><span class="select2 select2-container select2-container--default select2-container--above select2-container--focus" dir="ltr" data-select2-id="2" style="width: 139px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                          <ul class="select2-selection__rendered">
                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                          </ul>
                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></th>
                  <th rowspan="1" colspan="1"><select class="mymsel select2-hidden-accessible" multiple="" data-select2-id="3" tabindex="-1" aria-hidden="true">
                      <option value="" data-select2-id="76"></option>
                      <option value="Accountant" data-select2-id="77">Accountant</option>
                      <option value="Chief Executive Officer (CEO)" data-select2-id="78">Chief Executive Officer (CEO)</option>
                      <option value="Chief Financial Officer (CFO)" data-select2-id="79">Chief Financial Officer (CFO)</option>
                      <option value="Chief Marketing Officer (CMO)" data-select2-id="80">Chief Marketing Officer (CMO)</option>
                      <option value="Chief Operating Officer (COO)" data-select2-id="81">Chief Operating Officer (COO)</option>
                      <option value="Customer Support" data-select2-id="82">Customer Support</option>
                      <option value="Data Coordinator" data-select2-id="83">Data Coordinator</option>
                      <option value="Developer" data-select2-id="84">Developer</option>
                      <option value="Development Lead" data-select2-id="85">Development Lead</option>
                      <option value="Director" data-select2-id="86">Director</option>
                      <option value="Financial Controller" data-select2-id="87">Financial Controller</option>
                      <option value="Integration Specialist" data-select2-id="88">Integration Specialist</option>
                      <option value="Javascript Developer" data-select2-id="89">Javascript Developer</option>
                      <option value="Junior Javascript Developer" data-select2-id="90">Junior Javascript Developer</option>
                      <option value="Junior Technical Author" data-select2-id="91">Junior Technical Author</option>
                      <option value="Marketing Designer" data-select2-id="92">Marketing Designer</option>
                      <option value="Office Manager" data-select2-id="93">Office Manager</option>
                      <option value="Personnel Lead" data-select2-id="94">Personnel Lead</option>
                      <option value="Post-Sales support" data-select2-id="95">Post-Sales support</option>
                      <option value="Pre-Sales Support" data-select2-id="96">Pre-Sales Support</option>
                      <option value="Regional Director" data-select2-id="97">Regional Director</option>
                      <option value="Regional Marketing" data-select2-id="98">Regional Marketing</option>
                      <option value="Sales Assistant" data-select2-id="99">Sales Assistant</option>
                      <option value="Secretary" data-select2-id="100">Secretary</option>
                      <option value="Senior Javascript Developer" data-select2-id="101">Senior Javascript Developer</option>
                      <option value="Senior Marketing Designer" data-select2-id="102">Senior Marketing Designer</option>
                      <option value="Software Engineer" data-select2-id="103">Software Engineer</option>
                      <option value="Support Engineer" data-select2-id="104">Support Engineer</option>
                      <option value="Support Lead" data-select2-id="105">Support Lead</option>
                      <option value="System Architect" data-select2-id="106">System Architect</option>
                      <option value="Systems Administrator" data-select2-id="107">Systems Administrator</option>
                      <option value="Team Leader" data-select2-id="108">Team Leader</option>
                      <option value="Technical Author" data-select2-id="109">Technical Author</option>
                    </select><span class="select2 select2-container select2-container--default select2-container--above select2-container--focus" dir="ltr" data-select2-id="4" style="width: 210px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                          <ul class="select2-selection__rendered">
                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                          </ul>
                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></th>
                  <th rowspan="1" colspan="1"><select class="mymsel select2-hidden-accessible" multiple="" data-select2-id="5" tabindex="-1" aria-hidden="true">
                      <option value="" data-select2-id="112"></option>
                      <option value="Edinburgh" data-select2-id="113">Edinburgh</option>
                      <option value="London" data-select2-id="114">London</option>
                      <option value="New York" data-select2-id="115">New York</option>
                      <option value="San Francisco" data-select2-id="116">San Francisco</option>
                      <option value="Sidney" data-select2-id="117">Sidney</option>
                      <option value="Singapore" data-select2-id="118">Singapore</option>
                      <option value="Tokyo" data-select2-id="119">Tokyo</option>
                    </select><span class="select2 select2-container select2-container--default select2-container--above" dir="ltr" data-select2-id="6" style="width: 107px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                          <ul class="select2-selection__rendered">
                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                          </ul>
                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></th>
                  <th rowspan="1" colspan="1"><select class="mymsel select2-hidden-accessible" multiple="" data-select2-id="7" tabindex="-1" aria-hidden="true">
                      <option value=""></option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="33">33</option>
                      <option value="35">35</option>
                      <option value="36">36</option>
                      <option value="37">37</option>
                      <option value="38">38</option>
                      <option value="39">39</option>
                      <option value="40">40</option>
                      <option value="41">41</option>
                      <option value="42">42</option>
                      <option value="43">43</option>
                      <option value="46">46</option>
                      <option value="47">47</option>
                      <option value="48">48</option>
                      <option value="51">51</option>
                      <option value="53">53</option>
                      <option value="55">55</option>
                      <option value="56">56</option>
                      <option value="59">59</option>
                      <option value="61">61</option>
                      <option value="62">62</option>
                      <option value="63">63</option>
                      <option value="64">64</option>
                      <option value="65">65</option>
                      <option value="66">66</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="8" style="width: 37px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                          <ul class="select2-selection__rendered">
                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                          </ul>
                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></th>
                  <th rowspan="1" colspan="1"><select class="mymsel select2-hidden-accessible" multiple="" data-select2-id="9" tabindex="-1" aria-hidden="true">
                      <option value=""></option>
                      <option value="2008/09/26">2008/09/26</option>
                      <option value="2008/10/16">2008/10/16</option>
                      <option value="2008/10/26">2008/10/26</option>
                      <option value="2008/11/13">2008/11/13</option>
                      <option value="2008/11/28">2008/11/28</option>
                      <option value="2008/12/11">2008/12/11</option>
                      <option value="2008/12/13">2008/12/13</option>
                      <option value="2008/12/16">2008/12/16</option>
                      <option value="2008/12/19">2008/12/19</option>
                      <option value="2009/01/12">2009/01/12</option>
                      <option value="2009/02/14">2009/02/14</option>
                      <option value="2009/02/27">2009/02/27</option>
                      <option value="2009/04/10">2009/04/10</option>
                      <option value="2009/06/25">2009/06/25</option>
                      <option value="2009/07/07">2009/07/07</option>
                      <option value="2009/08/19">2009/08/19</option>
                      <option value="2009/09/15">2009/09/15</option>
                      <option value="2009/10/09">2009/10/09</option>
                      <option value="2009/10/22">2009/10/22</option>
                      <option value="2009/12/09">2009/12/09</option>
                      <option value="2010/01/04">2010/01/04</option>
                      <option value="2010/02/12">2010/02/12</option>
                      <option value="2010/03/11">2010/03/11</option>
                      <option value="2010/03/17">2010/03/17</option>
                      <option value="2010/06/09">2010/06/09</option>
                      <option value="2010/07/14">2010/07/14</option>
                      <option value="2010/09/20">2010/09/20</option>
                      <option value="2010/10/14">2010/10/14</option>
                      <option value="2010/11/14">2010/11/14</option>
                      <option value="2010/12/22">2010/12/22</option>
                      <option value="2011/01/25">2011/01/25</option>
                      <option value="2011/02/03">2011/02/03</option>
                      <option value="2011/03/09">2011/03/09</option>
                      <option value="2011/03/21">2011/03/21</option>
                      <option value="2011/04/25">2011/04/25</option>
                      <option value="2011/05/03">2011/05/03</option>
                      <option value="2011/05/07">2011/05/07</option>
                      <option value="2011/06/02">2011/06/02</option>
                      <option value="2011/06/07">2011/06/07</option>
                      <option value="2011/06/27">2011/06/27</option>
                      <option value="2011/07/25">2011/07/25</option>
                      <option value="2011/08/14">2011/08/14</option>
                      <option value="2011/09/03">2011/09/03</option>
                      <option value="2011/12/06">2011/12/06</option>
                      <option value="2011/12/12">2011/12/12</option>
                      <option value="2012/03/29">2012/03/29</option>
                      <option value="2012/04/09">2012/04/09</option>
                      <option value="2012/06/01">2012/06/01</option>
                      <option value="2012/08/06">2012/08/06</option>
                      <option value="2012/09/26">2012/09/26</option>
                      <option value="2012/10/13">2012/10/13</option>
                      <option value="2012/11/27">2012/11/27</option>
                      <option value="2012/12/02">2012/12/02</option>
                      <option value="2012/12/18">2012/12/18</option>
                      <option value="2013/02/01">2013/02/01</option>
                      <option value="2013/03/03">2013/03/03</option>
                      <option value="2013/08/11">2013/08/11</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="10" style="width: 93px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                          <ul class="select2-selection__rendered">
                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                          </ul>
                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></th>
                  <th rowspan="1" colspan="1"><select class="mymsel select2-hidden-accessible" multiple="" data-select2-id="11" tabindex="-1" aria-hidden="true">
                      <option value=""></option>
                      <option value="$1,200,000">$1,200,000</option>
                      <option value="$103,500">$103,500</option>
                      <option value="$103,600">$103,600</option>
                      <option value="$106,450">$106,450</option>
                      <option value="$109,850">$109,850</option>
                      <option value="$112,000">$112,000</option>
                      <option value="$114,500">$114,500</option>
                      <option value="$115,000">$115,000</option>
                      <option value="$125,250">$125,250</option>
                      <option value="$132,000">$132,000</option>
                      <option value="$136,200">$136,200</option>
                      <option value="$137,500">$137,500</option>
                      <option value="$138,575">$138,575</option>
                      <option value="$139,575">$139,575</option>
                      <option value="$145,000">$145,000</option>
                      <option value="$145,600">$145,600</option>
                      <option value="$162,700">$162,700</option>
                      <option value="$163,000">$163,000</option>
                      <option value="$163,500">$163,500</option>
                      <option value="$164,500">$164,500</option>
                      <option value="$170,750">$170,750</option>
                      <option value="$183,000">$183,000</option>
                      <option value="$198,500">$198,500</option>
                      <option value="$205,500">$205,500</option>
                      <option value="$206,850">$206,850</option>
                      <option value="$217,500">$217,500</option>
                      <option value="$234,500">$234,500</option>
                      <option value="$235,500">$235,500</option>
                      <option value="$237,500">$237,500</option>
                      <option value="$313,500">$313,500</option>
                      <option value="$320,800">$320,800</option>
                      <option value="$324,050">$324,050</option>
                      <option value="$327,900">$327,900</option>
                      <option value="$342,000">$342,000</option>
                      <option value="$345,000">$345,000</option>
                      <option value="$356,250">$356,250</option>
                      <option value="$357,650">$357,650</option>
                      <option value="$372,000">$372,000</option>
                      <option value="$385,750">$385,750</option>
                      <option value="$433,060">$433,060</option>
                      <option value="$452,500">$452,500</option>
                      <option value="$470,600">$470,600</option>
                      <option value="$645,750">$645,750</option>
                      <option value="$675,000">$675,000</option>
                      <option value="$725,000">$725,000</option>
                      <option value="$75,650">$75,650</option>
                      <option value="$85,600">$85,600</option>
                      <option value="$85,675">$85,675</option>
                      <option value="$850,000">$850,000</option>
                      <option value="$86,000">$86,000</option>
                      <option value="$86,500">$86,500</option>
                      <option value="$87,500">$87,500</option>
                      <option value="$90,560">$90,560</option>
                      <option value="$92,575">$92,575</option>
                      <option value="$95,400">$95,400</option>
                      <option value="$98,540">$98,540</option>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="12" style="width: 90px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                          <ul class="select2-selection__rendered">
                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                          </ul>
                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>
                <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>63</td>
                  <td>2011/07/25</td>
                  <td>$170,750</td>
                </tr>
                <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>66</td>
                  <td>2009/01/12</td>
                  <td>$86,000</td>
                </tr>
                <tr>
                  <td>Cedric Kelly</td>
                  <td>Senior Javascript Developer</td>
                  <td>Edinburgh</td>
                  <td>22</td>
                  <td>2012/03/29</td>
                  <td>$433,060</td>
                </tr>
                <tr>
                  <td>Airi Satou</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>33</td>
                  <td>2008/11/28</td>
                  <td>$162,700</td>
                </tr>
                <tr>
                  <td>Brielle Williamson</td>
                  <td>Integration Specialist</td>
                  <td>New York</td>
                  <td>61</td>
                  <td>2012/12/02</td>
                  <td>$372,000</td>
                </tr>
                <tr>
                  <td>Herrod Chandler</td>
                  <td>Sales Assistant</td>
                  <td>San Francisco</td>
                  <td>59</td>
                  <td>2012/08/06</td>
                  <td>$137,500</td>
                </tr>
                <tr>
                  <td>Rhona Davidson</td>
                  <td>Integration Specialist</td>
                  <td>Tokyo</td>
                  <td>55</td>
                  <td>2010/10/14</td>
                  <td>$327,900</td>
                </tr>
                <tr>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>39</td>
                  <td>2009/09/15</td>
                  <td>$205,500</td>
                </tr>
                <tr>
                  <td>Sonya Frost</td>
                  <td>Software Engineer</td>
                  <td>Edinburgh</td>
                  <td>23</td>
                  <td>2008/12/13</td>
                  <td>$103,600</td>
                </tr>
                <tr>
                  <td>Jena Gaines</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>30</td>
                  <td>2008/12/19</td>
                  <td>$90,560</td>
                </tr>
                <tr>
                  <td>Quinn Flynn</td>
                  <td>Support Lead</td>
                  <td>Edinburgh</td>
                  <td>22</td>
                  <td>2013/03/03</td>
                  <td>$342,000</td>
                </tr>
                <tr>
                  <td>Charde Marshall</td>
                  <td>Regional Director</td>
                  <td>San Francisco</td>
                  <td>36</td>
                  <td>2008/10/16</td>
                  <td>$470,600</td>
                </tr>
                <tr>
                  <td>Haley Kennedy</td>
                  <td>Senior Marketing Designer</td>
                  <td>London</td>
                  <td>43</td>
                  <td>2012/12/18</td>
                  <td>$313,500</td>
                </tr>
                <tr>
                  <td>Tatyana Fitzpatrick</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>19</td>
                  <td>2010/03/17</td>
                  <td>$385,750</td>
                </tr>
                <tr>
                  <td>Michael Silva</td>
                  <td>Marketing Designer</td>
                  <td>London</td>
                  <td>66</td>
                  <td>2012/11/27</td>
                  <td>$198,500</td>
                </tr>
                <tr>
                  <td>Paul Byrd</td>
                  <td>Chief Financial Officer (CFO)</td>
                  <td>New York</td>
                  <td>64</td>
                  <td>2010/06/09</td>
                  <td>$725,000</td>
                </tr>
                <tr>
                  <td>Gloria Little</td>
                  <td>Systems Administrator</td>
                  <td>New York</td>
                  <td>59</td>
                  <td>2009/04/10</td>
                  <td>$237,500</td>
                </tr>
                <tr>
                  <td>Bradley Greer</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>41</td>
                  <td>2012/10/13</td>
                  <td>$132,000</td>
                </tr>
                <tr>
                  <td>Dai Rios</td>
                  <td>Personnel Lead</td>
                  <td>Edinburgh</td>
                  <td>35</td>
                  <td>2012/09/26</td>
                  <td>$217,500</td>
                </tr>
                <tr>
                  <td>Jenette Caldwell</td>
                  <td>Development Lead</td>
                  <td>New York</td>
                  <td>30</td>
                  <td>2011/09/03</td>
                  <td>$345,000</td>
                </tr>
                <tr>
                  <td>Yuri Berry</td>
                  <td>Chief Marketing Officer (CMO)</td>
                  <td>New York</td>
                  <td>40</td>
                  <td>2009/06/25</td>
                  <td>$675,000</td>
                </tr>
                <tr>
                  <td>Caesar Vance</td>
                  <td>Pre-Sales Support</td>
                  <td>New York</td>
                  <td>21</td>
                  <td>2011/12/12</td>
                  <td>$106,450</td>
                </tr>
                <tr>
                  <td>Doris Wilder</td>
                  <td>Sales Assistant</td>
                  <td>Sydney</td>
                  <td>23</td>
                  <td>2010/09/20</td>
                  <td>$85,600</td>
                </tr>
                <tr>
                  <td>Angelica Ramos</td>
                  <td>Chief Executive Officer (CEO)</td>
                  <td>London</td>
                  <td>47</td>
                  <td>2009/10/09</td>
                  <td>$1,200,000</td>
                </tr>
                <tr>
                  <td>Gavin Joyce</td>
                  <td>Developer</td>
                  <td>Edinburgh</td>
                  <td>42</td>
                  <td>2010/12/22</td>
                  <td>$92,575</td>
                </tr>
                <tr>
                  <td>Jennifer Chang</td>
                  <td>Regional Director</td>
                  <td>Singapore</td>
                  <td>28</td>
                  <td>2010/11/14</td>
                  <td>$357,650</td>
                </tr>
                <tr>
                  <td>Brenden Wagner</td>
                  <td>Software Engineer</td>
                  <td>San Francisco</td>
                  <td>28</td>
                  <td>2011/06/07</td>
                  <td>$206,850</td>
                </tr>
                <tr>
                  <td>Fiona Green</td>
                  <td>Chief Operating Officer (COO)</td>
                  <td>San Francisco</td>
                  <td>48</td>
                  <td>2010/03/11</td>
                  <td>$850,000</td>
                </tr>
                <tr>
                  <td>Shou Itou</td>
                  <td>Regional Marketing</td>
                  <td>Tokyo</td>
                  <td>20</td>
                  <td>2011/08/14</td>
                  <td>$163,000</td>
                </tr>
                <tr>
                  <td>Michelle House</td>
                  <td>Integration Specialist</td>
                  <td>Sydney</td>
                  <td>37</td>
                  <td>2011/06/02</td>
                  <td>$95,400</td>
                </tr>
                <tr>
                  <td>Suki Burks</td>
                  <td>Developer</td>
                  <td>London</td>
                  <td>53</td>
                  <td>2009/10/22</td>
                  <td>$114,500</td>
                </tr>
                <tr>
                  <td>Prescott Bartlett</td>
                  <td>Technical Author</td>
                  <td>London</td>
                  <td>27</td>
                  <td>2011/05/07</td>
                  <td>$145,000</td>
                </tr>
                <tr>
                  <td>Gavin Cortez</td>
                  <td>Team Leader</td>
                  <td>San Francisco</td>
                  <td>22</td>
                  <td>2008/10/26</td>
                  <td>$235,500</td>
                </tr>
                <tr>
                  <td>Martena Mccray</td>
                  <td>Post-Sales support</td>
                  <td>Edinburgh</td>
                  <td>46</td>
                  <td>2011/03/09</td>
                  <td>$324,050</td>
                </tr>
                <tr>
                  <td>Unity Butler</td>
                  <td>Marketing Designer</td>
                  <td>San Francisco</td>
                  <td>47</td>
                  <td>2009/12/09</td>
                  <td>$85,675</td>
                </tr>
                <tr>
                  <td>Howard Hatfield</td>
                  <td>Office Manager</td>
                  <td>San Francisco</td>
                  <td>51</td>
                  <td>2008/12/16</td>
                  <td>$164,500</td>
                </tr>
                <tr>
                  <td>Hope Fuentes</td>
                  <td>Secretary</td>
                  <td>San Francisco</td>
                  <td>41</td>
                  <td>2010/02/12</td>
                  <td>$109,850</td>
                </tr>
                <tr>
                  <td>Vivian Harrell</td>
                  <td>Financial Controller</td>
                  <td>San Francisco</td>
                  <td>62</td>
                  <td>2009/02/14</td>
                  <td>$452,500</td>
                </tr>
                <tr>
                  <td>Timothy Mooney</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>37</td>
                  <td>2008/12/11</td>
                  <td>$136,200</td>
                </tr>
                <tr>
                  <td>Jackson Bradshaw</td>
                  <td>Director</td>
                  <td>New York</td>
                  <td>65</td>
                  <td>2008/09/26</td>
                  <td>$645,750</td>
                </tr>
                <tr>
                  <td>Olivia Liang</td>
                  <td>Support Engineer</td>
                  <td>Singapore</td>
                  <td>64</td>
                  <td>2011/02/03</td>
                  <td>$234,500</td>
                </tr>
                <tr>
                  <td>Bruno Nash</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>38</td>
                  <td>2011/05/03</td>
                  <td>$163,500</td>
                </tr>
                <tr>
                  <td>Sakura Yamamoto</td>
                  <td>Support Engineer</td>
                  <td>Tokyo</td>
                  <td>37</td>
                  <td>2009/08/19</td>
                  <td>$139,575</td>
                </tr>
                <tr>
                  <td>Thor Walton</td>
                  <td>Developer</td>
                  <td>New York</td>
                  <td>61</td>
                  <td>2013/08/11</td>
                  <td>$98,540</td>
                </tr>
                <tr>
                  <td>Finn Camacho</td>
                  <td>Support Engineer</td>
                  <td>San Francisco</td>
                  <td>47</td>
                  <td>2009/07/07</td>
                  <td>$87,500</td>
                </tr>
                <tr>
                  <td>Serge Baldwin</td>
                  <td>Data Coordinator</td>
                  <td>Singapore</td>
                  <td>64</td>
                  <td>2012/04/09</td>
                  <td>$138,575</td>
                </tr>
                <tr>
                  <td>Zenaida Frank</td>
                  <td>Software Engineer</td>
                  <td>New York</td>
                  <td>63</td>
                  <td>2010/01/04</td>
                  <td>$125,250</td>
                </tr>
                <tr>
                  <td>Zorita Serrano</td>
                  <td>Software Engineer</td>
                  <td>San Francisco</td>
                  <td>56</td>
                  <td>2012/06/01</td>
                  <td>$115,000</td>
                </tr>
                <tr>
                  <td>Jennifer Acosta</td>
                  <td>Junior Javascript Developer</td>
                  <td>Edinburgh</td>
                  <td>43</td>
                  <td>2013/02/01</td>
                  <td>$75,650</td>
                </tr>
                <tr>
                  <td>Cara Stevens</td>
                  <td>Sales Assistant</td>
                  <td>New York</td>
                  <td>46</td>
                  <td>2011/12/06</td>
                  <td>$145,600</td>
                </tr>
                <tr>
                  <td>Hermione Butler</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>47</td>
                  <td>2011/03/21</td>
                  <td>$356,250</td>
                </tr>
                <tr>
                  <td>Lael Greer</td>
                  <td>Systems Administrator</td>
                  <td>London</td>
                  <td>21</td>
                  <td>2009/02/27</td>
                  <td>$103,500</td>
                </tr>
                <tr>
                  <td>Jonas Alexander</td>
                  <td>Developer</td>
                  <td>San Francisco</td>
                  <td>30</td>
                  <td>2010/07/14</td>
                  <td>$86,500</td>
                </tr>
                <tr>
                  <td>Shad Decker</td>
                  <td>Regional Director</td>
                  <td>Edinburgh</td>
                  <td>51</td>
                  <td>2008/11/13</td>
                  <td>$183,000</td>
                </tr>
                <tr>
                  <td>Michael Bruce</td>
                  <td>Javascript Developer</td>
                  <td>Singapore</td>
                  <td>29</td>
                  <td>2011/06/27</td>
                  <td>$183,000</td>
                </tr>
                <tr>
                  <td>Donna Snider</td>
                  <td>Customer Support</td>
                  <td>New York</td>
                  <td>27</td>
                  <td>2011/01/25</td>
                  <td>$112,000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  $(function() {
    var laptable;
    laptable = $('#lapBulanan').DataTable({
      // "dom": '<"bottom"B><lfrtip>',
      dom: 'Bfrtip',
      lengthMenu: [
        [10, 25, 50, -1],
        ['10 baris', '25 baris', '50 baris', 'Show all']
      ],
      buttons: [{
          extend: 'pageLength',
          className: "browser-default"
        },
        {
          extend: 'excel',
          text: 'Excel',
          key: {
            key: 'p',
            altkey: true
          }
        }
      ],
      "fixedHeader": true,
      // "scrollX": true,
      initComplete: function() {
        this.api().columns().every(function() {
          var column = this;
          //added class "mymsel"
          var select = $('<select class="mymsel" multiple="multiple"><option value=""></option></select>')
            .appendTo($(column.footer()).empty())
            .on('change', function() {
              var pilih = $('option:selected', this).map(function(index, element) {
                return $.fn.dataTable.util.escapeRegex($(element).val());
              }).toArray().join('|');

              column
                .search(pilih.length > 0 ? '^(' + pilih + ')$' : '', true, false)
                .draw();
            });

          column.data().unique().sort().each(function(d, j) {
            select.append('<option value="' + d + '">' + d + '</option>')
          });
        });
        //select2 init for .mymsel class
        $(".mymsel").select2();

      },
      // pageLength: 10,
      // lengthMenu: [10, 20, 50, 100, 200, 500],
    });
    table.buttons(0, null).containers().appendTo('body');
    // $('.tahun').on('change', function() {
    //   laptable.columns(1).search(this.value).draw();
    // });
  });
</script>