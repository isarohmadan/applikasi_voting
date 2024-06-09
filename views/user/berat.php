<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("./views/user/components/header.php")?>
</head>
<?php include_once("./views/user/components/navbar.php")?>
<div class="container mx-auto p-4 border-2 rounded-xl mt-5">
  <h1 class="text-4xl text-center mb-8">Konfersi Berat</h1>
  <div class="flex flex-wrap">
    <div class="w-full md:w-1/3 p-4">
      <input type="number" id="weightInput" class="border border-gray-400 p-2 rounded-lg" placeholder="Enter weight">
    </div>
    <div class="w-full md:w-1/3 p-4">
      <select id="weightTypeFrom" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        <option value="milligram">Milligrams</option>
        <option value="gram">Grams</option>
        <option value="kilogram">Kilograms</option>
        <option value="ton">Tons</option>
      </select>
    </div>
    <div class="w-full md:w-1/3 p-4">
      <select id="weightTypeTo" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        <option value="milligram">Milligrams</option>
        <option value="gram">Grams</option>
        <option value="kilogram">Kilograms</option>
        <option value="ton">Tons</option>
      </select>
    </div>
  </div>
  <div class="mt-4">
    <button id="convertWeight" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Convert</button>
  </div>
  <div class="mt-4">
    <p id="result" class="text-xl text-center"></p>
  </div>
</div>



<script src="./asset/js/berat.js">
</script>
</html>