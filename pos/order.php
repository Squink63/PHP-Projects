<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>

body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
  margin-top: 5px;
}
 
.sidebar a.active {
  background-color: rgb(107, 64, 241);
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: rgb(107, 64, 241);
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

.navbar {
    background-color: rgb(107, 64, 241);
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

.gradient-custom-1 {
  /* fallback for old browsers */
  background: #cd9cf2;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to top, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to top, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1))
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}
tbody td {
  font-weight: 500;
  color: #999999;
}
</style>
</head>
<body>

<div class="sidebar">
  <a class="active" href="order.php">Orders</a>
</div>



<div class="content">
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Orders</a>
            <a class="navbar-brand text-danger float-end" href="index.php">Log out</a>
        </div>
        </nav>

        <!-- As a heading -->
        
    </nav>
    <section class="intro">
  <div class="gradient-custom-1 h-100">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="table-responsive bg-white">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th scope="col">Customer</th>
                    <th scope="col">POSITION</th>
                    <th scope="col">CONTACTS</th>
                    <th scope="col">AGE</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">SALARY</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row" style="color: #666666;">Tiger Nixon</th>
                    <td>System Architect</td>
                    <td>tnixon12@example.com</td>
                    <td>61</td>
                    <td>Edinburgh</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <th scope="row" style="color: #666666;">Sonya Frost</th>
                    <td>Software Engineer</td>
                    <td>sfrost34@example.com</td>
                    <td>23</td>
                    <td>Edinburgh</td>
                    <td>$103,600</td>
                  </tr>
                  <tr>
                    <th scope="row" style="color: #666666;">Jena Gaines</th>
                    <td>Office Manager</td>
                    <td>jgaines75@example.com</td>
                    <td>30</td>
                    <td>London</td>
                    <td>$90,560</td>
                  </tr>
                  <tr>
                    <th scope="row" style="color: #666666;">Quinn Flynn</th>
                    <td>Support Lead</td>
                    <td>qflyn09@example.com</td>
                    <td>22</td>
                    <td>Edinburgh</td>
                    <td>$342,000</td>
                  </tr>
                  <tr>
                    <th scope="row" style="color: #666666;">Charde Marshall</th>
                    <td>Regional Director</td>
                    <td>cmarshall28@example.com</td>
                    <td>36</td>
                    <td>San Francisco</td>
                    <td>$470,600</td>
                  </tr>
                  <tr>
                    <th scope="row" style="color: #666666;">Haley Kennedy</th>
                    <td>Senior Marketing Designer</td>
                    <td>hkennedy63@example.com</td>
                    <td>43</td>
                    <td>London</td>
                    <td>$313,500</td>
                  </tr>
                  <tr>
                    <th scope="row" style="color: #666666;">Tatyana Fitzpatrick</th>
                    <td>Regional Director</td>
                    <td>tfitzpatrick00@example.com</td>
                    <td>19</td>
                    <td>Warsaw</td>
                    <td>$385,750</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
</div>

</body>
</html>