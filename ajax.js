
// =========================================================================================================================
// PT: funções
// EN: functions
// =========================================================================================================================


// -------------------------------------------------------------------------------------------------------------------------
// PT: classe de ligação AJAX
// EN: AJAX connection class

var AjaxLink = CreateAjaxLink();

function CreateAjaxLink()
{
  var l_link = function() { throw("E#I'm not callable."); };

  l_link.m_serial = 0;



  // -----------------------------------------------------------------------------------------------------------------------
  // PT: criar um número de série de um pedido AJAX
  // EN: create an AJAX request serial number

  l_link.genSerial = function() { return(++ this.m_serial); }


  // -----------------------------------------------------------------------------------------------------------------------
  // PT: criar um pedido AJAX
  // EN: create an AJAX request

  l_link.createRequest = function()
  {
    var l_request = null;

    if(window.XMLHttpRequest) l_request = new XMLHttpRequest();
    else if(window.ActiveXObject) l_request = new ActiveXObject("Microsoft.XMLHTTP"); // TODO PT: Msxml2
    else throw("E#Bad browser");

    // PT: número de série deste pedido
    l_request.m_serial = this.genSerial();

    // PT: se o pedido é síncrono
    l_request.m_sync = false;
    // TODO PT: todo o código de AJAX síncrono

    // PT: contagem de tentativas
    l_request.m_retryCount = 0;

    // PT: resposta ao eventos de pedido finalizado
    l_request.onSuccess = null;
    l_request.onFail = null;
    l_request.onFinally = null;

    l_request.m_origin = null;

    l_request.m_result = null;

    l_request.m_exception = null;

    l_request.resultText = function() { return(this.responseText); }
    l_request.resultXML = function() { return(this.responseXML); }



    // ---------------------------------------------------------------------------------------------------------------------
    // PT: lidar com as mudanças de estado na ligação
    // EN: deal with the state changes in the link

    l_request.onreadystatechange = function()
    {
      switch(this.readyState)
      {
        case 4:
        {
          switch(this.status)
          {
            case 200:
            {
              if(null != this.onSuccess) this.onSuccess(this);
              break;
            }
            case 404:
            {
              // TODO PT: converter isto para algo mais útil
              if(null != this.onFail) this.onFail(this);
              break;
            }
            default:
            {
              alert(this.status);
              throw("E#Unexpected result.");
            }
          }

          if(null != this.onFinally) this.onFinally(this);
          break;
        }
      }
    }



    // ---------------------------------------------------------------------------------------------------------------------
    // PT: enviar um pedido AJAX GET
    // EN: send a GET AJAX request

    l_request.get = function(p_url)
    {
      this.open("GET", p_url, !this.m_sync);
      // TODO PT: o Content-type tem que depender de haver ficheiros ou não...
      this.setRequestHeader('X-OWF-RequestID', this.m_serial);
      this.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      this.send(null);

      // TODO PT: se o pedido for feito sincronamente, é necessário esperar e retornar os dados
      if(this.m_sync && 200 === this.status) return(this.m_result);
      else return(true);

    }



    // ---------------------------------------------------------------------------------------------------------------------
    // PT: requisitar um valor único
    // EN: request a single value

    l_request.getRequest = function(p_url) { return(this.get("../action.php/" + p_url)); }


    return(l_request);

  }


  return(l_link);
}


// =========================================================================================================================
// EOF
// =========================================================================================================================
