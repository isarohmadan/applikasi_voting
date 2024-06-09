
<!DOCTYPE html>
<html lang="en">
    <?php include_once('./views/user/components/header.php');?>
<body>
    <?php include_once('./views/user/components/navbar.php');?>    
    <div class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-center">Calculator</h1>
        <div class="bg-white shadow-md rounded-lg p-8">
            <div class="flex justify-between mb-4">
                <input type="text" id="display" class="w-full text-right text-4xl font-bold bg-gray-200 rounded-lg p-4" readonly>
            </div>
            <div class="grid grid-cols-4 gap-4">
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">7</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">8</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">9</button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">/</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">4</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">5</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">6</button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">*</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">1</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">2</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">3</button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">-</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">0</button>
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">.</button>
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">=</button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">+</button>
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">CLS</button>
            </div>
        </div>
    </div>
</div>
<script src="./asset/js/kalkulator.js">

</script>
</body>
</html>