
// =========================================================================================================================
// web/scripts/security.js
// PT:
// EN:
// (C) 2019+
// =========================================================================================================================


// =========================================================================================================================
// EN: dependencies

// =========================================================================================================================
// EN: code begin
// =========================================================================================================================

// -------------------------------------------------------------------------------------------------------------------------
// PT: utilizador não encontrado
// EN: user not found

document.wrongcount = 0;

function securelogin_nouser()
{
  if(3 <= document.wrongcount) greta();
  document.getElementById("status").setAttribute("status", "nouser");
  document.getElementById("statustext").innerHTML = "Parece que não existes...";
  ++ document.wrongcount;
}

// -------------------------------------------------------------------------------------------------------------------------
// PT: password errada
// EN: wrong password

function securelogin_wrongpassword()
{
  if(3 <= document.wrongcount) greta();
  document.getElementById("status").setAttribute("status", "wrongpassword");
  document.getElementById("statustext").innerHTML = "Ooops... password errada...";
  ++ document.wrongcount;
}

// -------------------------------------------------------------------------------------------------------------------------
// PT: autenticação com sucesso
// EN: successful authentication

function securelogin_success()
{
  document.wrongcount = 0;
  document.getElementById("status").setAttribute("status", "ok");
  document.getElementById("statustext").innerHTML = "Nice...";
}


// -------------------------------------------------------------------------------------------------------------------------
// PT: bónus
// EN: bonus

function greta()
{
  document.getElementById("hidden").style.display = "table";
}


// -------------------------------------------------------------------------------------------------------------------------
// PT:
// EN:

function regreta()
{
  document.getElementById("hidden").style.display = "none";
}



// =========================================================================================================================
// === EOF =================================================================================================================
// =========================================================================================================================
