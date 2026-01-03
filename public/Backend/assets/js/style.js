/**************************************** Sidebar Menu Open Close *************************************************/

let btn = document.querySelector('#btn');
let sidebarMenu = document.querySelector('.sidebar-menu');
let dashboardMainBtn = document.querySelector('.dashboard-main');

btn.onclick = function() {
  sidebarMenu.classList.toggle('active');
  dashboardMainBtn.classList.toggle('active');
}
/**************************************** Sidebar Menu Open Close *************************************************/

/**************************************** Data Table *************************************************/

  $(document).ready(function() {
      $('#example').DataTable({
        scrollY:        300,
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   true,
        // https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json
      });
  } );

/**************************************** Data Table *************************************************/


/**************************************** Chart JS ****************************************/

// https://www.chartjs.org/docs/latest/
// https://html-color.codes/ if you want to color JavaScript
let myChartDoughnut   = document.getElementById('myChartDoughnut');
let myChartLine       = document.getElementById('myChartLine');
let myCharBar         = document.getElementById('myCharBar');
let myChartPolarArea  = document.getElementById('myChartPolarArea');

let char1 = new Chart(myChartDoughnut, {
  type:'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets:[{
      label:'Population',
      data:[200, 50, 100, 70, 60, 30],
      //backgroundColor:'green',
      backgroundColor:[
        'rgb(255,51,51)',
        'rgb(54, 162, 235)',
        'rgb(255,255,102)',
        'rgb(201, 203, 207)',
        'rgb(221,160,221)',
        'rgb(255,165,0)'
      ],
      hoverOffset: 4
    }]
  }
});

let char2 = new Chart(myChartLine, {
  type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:['January', 'February', 'March', 'April', 'May', 'June',],
    datasets:[{
      label:'My First dataset',
      data:[0, 10, 5, 2, 20, 30, 45],
      //backgroundColor:'green',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
      hoverOffset: 4
    }]
  }
});

let char3 = new Chart(myCharBar, {
  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    label: 'Bar Dataset',
    labels:['January', 'February', 'March', 'April'],
    datasets:[{
      type: 'bar',
      label: 'Bar Dataset',
      data: [10, 20, 30, 40],
      borderColor: 'rgb(255, 99, 132)',
      backgroundColor: 'rgba(255, 99, 132, 0.2)'
    }, {
        type: 'line',
        label: 'Line Dataset',
        data: [50, 50, 50, 50],
        fill: false,
        borderColor: 'rgb(54, 162, 235)'
      }]
  }
});


let char4 = new Chart(myChartPolarArea, {
  type:'polarArea', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:[ 'Red', 'Green', 'Yellow', 'Grey', 'Blue'],
    datasets:[{
      label: 'My First Dataset',
      data: [11, 16, 7, 3, 14],
      backgroundColor:[
        'rgb(255, 99, 132)',
        'rgb(75, 192, 192)',
        'rgb(255, 205, 86)',
        'rgb(201, 203, 207)',
        'rgb(54, 162, 235)'
      ],
    }]
  }
});

/**************************************** Chart JS ****************************************/
