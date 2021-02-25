function allLetter(inputtxt)
      { 
      var letters = /^[A-Za-z]+$/;
      if(inputtxt.value.match(letters))
      {
      alert('Name was accepted');
      return true;
      }
      else
      {
      alert('Please input alphabet characters only');
      return false;
      }
      }

function CheckPassword(inputtxt) 
{ 
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
if(inputtxt.value.match(passw)) 
{ 
alert('Accepted Password')
return true;
}
else
{ 
alert('Password should be between 6&20 characters including 1 uppercase, 1 lowercase & 1 digit')
return false;
}
}