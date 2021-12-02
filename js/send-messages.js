// Variables
let $form = document.getElementById('form');
let $btnSend = document.getElementById('btn-send');

// Functions
const sendMessage = async (e) => {
    e.preventDefault();

    let formData = new FormData($form);
    
   try {

       let request = await fetch('../backend/send-message.php', {
           method: 'POST',
           body: formData
       });

       let answer = await request.json();

       if(answer.status === 'success') {
           Swal.fire({
                icon: 'success',
                title: 'Se ha enviado correctamente',
                text: answer.message
            });

       } else {
           Swal.fire({
                icon: 'error',
                title: 'Ocurrió un error',
                text: answer.message
            });
       }


       console.log(answer);

   } catch (error) {
       console.log(error);
   }
}

// Executions
$btnSend.addEventListener('click', sendMessage);
