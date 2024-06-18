
// Menambahkan event listener pada setiap elemen dengan class deadline
document.querySelectorAll('.deadline').forEach((deadlineElement) => {
    const deadline = new Date(deadlineElement.dataset.deadline).getTime();
    const interval = setInterval(() => {
      const now = new Date().getTime();
      const distance = deadline - now;
  
      if (distance < 0) {
        // Deadline expired
        deadlineElement.classList.add('expired');
        deadlineElement.innerHTML = "EXPIRED";
        deadlineElement.nextElementSibling.classList.add('expired');
        const buttons = deadlineElement.closest('.bg-white').querySelectorAll('.dukung');
        buttons.forEach((button) => {
          button.disabled = true;
          button.classList.add('opacity-50', 'cursor-not-allowed', 'hover:bg-gray-400');
        });
        clearInterval(interval);
      } else {
        // Deadline not expired
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
        deadlineElement.textContent = `${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;
      }
    }, 1000);
  });


  document.querySelectorAll('.status').forEach((statusElement) => {
    if (statusElement.getAttribute('data-status') === 'selesai') {
      // Status is selesai
      const categoryId = statusElement.closest('.bg-white').id.split('-')[1];
      const winner = countWinner(categoryId);
      const winnerElement = document.createElement('p');
      winnerElement.textContent = `Pemenang Voting = ${winner}`;
      winnerElement.classList.add('text-gray-600', 'mt-5', 'bg-blue-300' , 'p-2' , 'rounded-lg' , 'text-center' , 'font-bold' , 'text-xl' , 'text-white');
      statusElement.closest('.bg-white').appendChild(winnerElement);
  
      const buttons = statusElement.closest('.bg-white').querySelectorAll('.dukung');
      buttons.forEach((button) => {
        button.disabled = true;
      });
    }else{
        statusElement.textContent = 'Sedang Berlangsung';
        statusElement.classList.add('bg-yellow-400');
    }
  });

 function countWinner(categoryId) {
  const poolings = document.querySelectorAll(`#category-${categoryId} .bg-white`);
  let winner = 'Seri';
  let votesCollection = {};

     poolings.forEach((pooling) => {
    const votes =  parseInt(pooling.querySelector('.border-2').textContent.split(':')[1].trim());
    votesCollection[pooling.querySelector('h4').innerHTML] = votes;
    });

    const maxVotes = Math.max(...Object.values(votesCollection));
    const winners = Object.keys(votesCollection).filter((key) => votesCollection[key] === maxVotes);
    if(winners.length === 1){
        winner = winners[0];
    }else{
        winner = 'Seri';
    }
    return winner;
}


const modal = document.getElementsByClassName('modal');
const id_pool = document.getElementById('id_pool');

document.querySelectorAll('.dukung').forEach((button) => {
    button.addEventListener('click', (event) => {
        // Set the value of the hidden input
        $id_pooling = parseInt(button.getAttribute('id-pool'));
        modal[0].querySelector('#id_pool').value = $id_pooling;
        // Show the modal
        modal[0].classList.remove('hidden');

      // Prevent the default action of the button
      event.preventDefault();
  
      // Your voting logic here
    });
  });

    document.getElementById('close-modal').addEventListener('click', () => {
        modal[0].classList.add('hidden');
    });