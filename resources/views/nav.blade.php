<style>
.nav{
        
    height:10vh;
    background: rgb(62, 16, 116);
    display:flex;
    justify-content:space-between;
    align-items:center;
    position: -webkit-sticky;  
    position: relative;
    top: 0;
    padding: 5px;
    border: 0px double #ffffff;
    border-spacing: 2px;
  
     }
  
     .textnav	{ 	color: rgb(255, 255, 255);
              font-size: 18px;
              font-family: Arial;
              text-decoration: none;
              }

    .h1{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
          color: rgb(253, 253, 253);
          font-style:italic;

    }
  
        /*Dropdown login menu*/
        .userimg{
          cursor: pointer;
        }
        
        .dropdown {
          position: relative;
          display: inline-block;
        }
        
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        
        .dropdown-content a {
          font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          text-align: center;
          display: block;
        }
        
        .dropdown-content a:hover {background-color: #bdbaba;}
        .dropdown:hover .dropdown-content {display: block;}
        
  

</style>


<div class="nav">
    <table align="left">
    <tr>
    <td> 
    <h1 class="h1">Inventory<h1></td>
      <td><img src="Images/chocolate-bar.png" width="40px" height="40px">

    </td>
    </tr>
    </table>
    
    <table width="250px" align="right">
    <tr>
    <td align="center"><a class="textnav" href="/" target="_parent" ><b>Home</b></a></td>
    <td align="center"><a class="textnav" href="" target="_parent" ><b>Details</b></a></td>
    <td align="center">
    <div class="dropdown">
    <img src="Images/user.png" width="40px" height="40px" class="userimg">
      <div class="dropdown-content" style="right:0;">
        <a href="/LogIn">Log In</a>
        <a href="/SignUp">Sign Up</a>
      </div>
    </div>
    </td>
    </tr>
    </table>
    
    </div>
    