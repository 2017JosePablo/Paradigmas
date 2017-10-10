<html>
<head>
<title>jspdf  </title>
</head>
<style type="text/css">
 td {
 padding:10px;

}
 th {
 padding:10px;
 background-color:aqua;
 }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
<div id="divEmployee">
 <table id="tab_customers">

<thead>
 <tr class='warning'>
 <th>ID</th>
 <th>Name</th>
 <th>Join Date</th>
 <th>Age</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <td>1</td>
 <td>Aman Roy</td>
 <td>March 25, 2014</td>
 <td>25</td>
 </tr>
 <tr>
 <td>2</td>
 <td>Vishal Singh</td>
 <td>January 25, 2014</td>
 <td>26</td>
 </tr>
 <tr>
 <td>3</td>
 <td>Gaurav Singh</td>
 <td>March 25, 2014</td>
 <td>25</td>
 </tr>
 <tr>
 <td>4</td>
 <td>Vinod Palne</td>
 <td>May 25, 2014</td>
 <td>22</td>
 </tr>
 </tbody>
 </table>

</div>
<button onclick="javascript:Export();">Exportar a PDF</button>
<script type="text/javascript">
 function Export() {
 var pdf = new jsPDF('p', 'pt', 'letter');

pdf.text(50, 25, "Employee Report");
 // source can be HTML-formatted string, or a reference
 // to an actual DOM element from which the text will be scraped.
 source = document.getElementById('divEmployee').innerHTML;

// we support special element handlers. Register them with jQuery-style
 // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
 // There is no support for any other type of selectors
 // (class, of compound) at this time.
 specialElementHandlers = {
 // element with id of "bypass" - jQuery style selector
 '#bypassme': function (element, renderer) {
 // true = "handled elsewhere, bypass text extraction"
 return true
 }
 };
 margins = {
 top: 80,
 bottom: 60,
 left: 40,
 width: 522
 };
 // all coords and widths are in jsPDF instance's declared units
 // 'inches' in this case
 pdf.fromHTML(
 source, // HTML string or DOM elem ref.
 margins.left, // x coord
 margins.top, { // y coord
 'width': margins.width, // max width of content on PDF
 'elementHandlers': specialElementHandlers
 },

function (dispose) {
 // dispose: object with X, Y of the last line add to the PDF
 // this allow the insertion of new lines after html
 pdf.save('Test.pdf');
 }, margins);
 }
</script></html>
