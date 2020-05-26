
// =========================================================================================================================
// web/scripts/security.js
// PT:
// EN:
// (C) 2019+
// =========================================================================================================================


// =========================================================================================================================
// EN: code begin
// =========================================================================================================================

// -------------------------------------------------------------------------------------------------------------------------
// PT: iniciar login
// EN:

function security_login(p_username, p_password, p_nouser, p_wrongpassword, p_success)
{
  // PT: criar uma nova ligação AJAX para pedir o salt e nonce
  // EN: create a new AJAX connection to request the salt and nonce
  let l_saltRequest = AjaxLink.createRequest();

  // PT: em caso de sucesso, executar esta função
  // EN: on success, execute this function
  l_saltRequest.onSuccess = function()
  {
    // PT: se o valor retornado for "NO USER", então tratar
    if("NO USER" == this.resultText())
    {
      p_nouser();
      return;
    }
    else if("WRONG PASSWORD" == this.resultText())
    {
      p_wrongpassword();
      return;
    }
    let l_loginRequest = AjaxLink.createRequest();
    l_loginRequest.onSuccess = function()
    {
      if("NO USER" == this.resultText())
      {
        p_nouser();
        return;
      }
      else if("WRONG PASSWORD" == this.resultText())
      {
        p_wrongpassword();
        return;
      }
      else if("OK" == this.resultText())
      {
        p_success();
        return;
      }
      else
      {
        throw "This shouldn't happen.";
      }
    }

    l_set = this.resultText().split(":");

    l_loginRequest.getRequest("securelogin?username=" + p_username + "&password=" + security_hash_password(p_password, l_set[0], l_set[1]));
  };

  l_saltRequest.getRequest("../action.php/securelogin_init?username=" + p_username);

}



// -------------------------------------------------------------------------------------------------------------------------
// PT: transformar uma password na form
// EN: transform a form password

function security_form_password_hash(p_element)
{
  var l_password = p_element.value;
  var l_salt = p_element.form.elements["salt"].value;

  return(security_hash_password(l_password, l_salt));
}



// -------------------------------------------------------------------------------------------------------------------------
// PT: transformar uma password
// EN: transform a password

function security_hash_password(p_password, p_salt, p_nonce)
{
  return(hex_hmac_sha1(p_nonce, hex_sha1(p_salt + p_password)));
}



// -------------------------------------------------------------------------------------------------------------------------
// PT: efectuar logout
// EN: execute the logout

function security_logout()
{
  var l_request = AjaxLink.createRequest();

  l_request.onSuccess = function()
  {
    if("OK" == this.resultText()) securelogout_success();
  };

  l_request.getRequest("securelogout");
}



// =========================================================================================================================
// === EOF =================================================================================================================
// =========================================================================================================================
