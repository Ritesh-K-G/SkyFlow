function func() {
    let x = document.forms["frm"]["aircraft_id"].value;
    if (x == "") {
      alert("Aircraft ID is compulsory!!");
      return false;
    }
  }

  function func1() {
    var regName = /^[ a-zA-Z\-\’]+$/;
    let x = document.forms["frm"]["emp_name"].value;

    if (!regName.test(x)) {
      alert('Invalid name');
      return false;
    }

    let y = document.forms["frm"]["emp_age"].value;
    if(y<=0)
    {
      alert('Invalid age');
      return false;
    } 
  }

  
  function func2() {
    let x = document.forms["frm"]["airport_id"].value;
    if (x == "") {
      alert("Airport ID is compulsory!!");
      return false;
    }

    var regName = /^[ a-zA-Z\-\’]+$/;
    let y = document.forms["frm"]["airport_name"].value;

    if (!regName.test(y)) {
      alert('Invalid airport_name');
      return false;
    }
   
  }

  function func3() {
    let x = document.forms["frm"]["airport_id"].value;
    if (x == "") {
      alert("Airport ID is compulsory!!");
      return false;
    }
  }

  function func4() {
    let x = document.forms["frm"]["emp_id"].value;
    if (x == "") {
      alert("Employee ID is compulsory!!");
      return false;
    }   
    
  }
