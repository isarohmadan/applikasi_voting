<nav class="bg-white shadow-lg">
  <div class="max-w-6xl mx-auto px-4">
    <div class="flex justify-between">
      <div class="flex space-x-7">
        <a href="user.php?page=dashboard" class="flex items-center py-4 px-2">
          <span class="font-semibold text-gray-500 text-lg">Voting user</span>
        </a>
      </div>
      <div class="hidden md:flex items-center space-x-1">
        <a href="user.php?page=dashboard" class="py-4 px-2 text-gray-500 font-semibold hover:text-purple-500 transition duration-300">Dashboard</a>
        <a href="user.php?page=pooling" class="py-4 px-2 text-gray-500 font-semibold hover:text-purple-500 transition duration-300">Voting</a>
        <a href="user.php?page=pemilihan_pooling" class="py-4 px-2 text-gray-500 font-semibold hover:text-purple-500 transition duration-300">Pemilihan</a>
        <a href="user.php?page=logout" class="py-4 px-2 text-gray-500 font-semibold hover:text-purple-500 transition duration-300">Logout</a>
      </div>
      <div class="md:hidden flex items-center">
        <button class="outline-none menu-button">
          <svg class="w-6 h-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
  <div class="hidden mobile-menu">
    <ul>
      <li class="active">
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">Services</a>
      </li>
      <li>
        <a href="#">About</a>
      </li>
      <li>
        <a href="#">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>

<script>
  const btn = document.querySelector('button.menu-button');
  const menu = document.querySelector('.mobile-menu');
  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>