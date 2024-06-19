<template>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
      <div class="container mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
          <div class="w-full md:w-1/2">
            <div class="flex justify-between items-center mb-4">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
              </div>
              <input
                v-model="filterText"
                type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Filter table..."
              />
            </div>
          </div>
          <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <button type="button" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
              <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
              </svg>
              Tambahkan Pegawai
            </button>
            <div class="flex items-center space-x-3 w-full md:w-auto">
              <div class="relative w-full">
                <select v-model="selectedUnitKerja" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  <option value="">Filter by Unit Kerja</option>
                  <option v-for="unit in uniqueUnitKerja" :key="unit" :value="unit">{{ unit }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>
  
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
            <thead class="bg-gray-200">
              <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">NIP</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Nama</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Tempat Lahir</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Alamat</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Tanggal Lahir</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Kelamin</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">NPWP</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">No HP</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Unit Kerja</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Tempat Tugas</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Nama Jabatan</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Foto</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Eselon</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Golongan</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(person, index) in filteredPeople" :key="index" class="border-b">
                <td class="px-6 py-4">{{ person.nip }}</td>
                <td class="px-6 py-4">{{ person.nama }}</td>
                <td class="px-6 py-4">{{ person.tempatlahir }}</td>
                <td class="px-6 py-4">{{ person.alamat }}</td>
                <td class="px-6 py-4">{{ person.tanggallahir }}</td>
                <td class="px-6 py-4">{{ person.kelamin }}</td>
                <td class="px-6 py-4">{{ person.npwp }}</td>
                <td class="px-6 py-4">{{ person.nohp }}</td>
                <td class="px-6 py-4">{{ person.unitkerja }}</td>
                <td class="px-6 py-4">{{ person.tempattugas }}</td>
                <td class="px-6 py-4">{{ person.namajabatan }}</td>
                <td class="px-6 py-4">
                  <img :src="person.foto" alt="foto" class="w-10 h-10 rounded-full" />
                </td>
                <td class="px-6 py-4">{{ person.echelon.eselon }}</td>
                <td class="px-6 py-4">{{ person.group.golongan }}</td>
                <td class="px-4 py-3 flex items-center justify-end">
                                <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="apple-imac-27-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                    </div>
                                </div>
                            </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import { ref, computed, onMounted } from 'vue'
  import { initFlowbite } from 'flowbite'
  
  // initialize components based on data attribute selectors
  onMounted(() => {
    initFlowbite()
    fetchPeople()

  })
  
  const filterText = ref('')
  const selectedUnitKerja = ref('')
  
  const people = ref([])
  
  const uniqueUnitKerja = computed(() => {
    const units = people.value.map(person => person.unitkerja)
    return [...new Set(units)]
  })
  
  const filteredPeople = computed(() => {
    return people.value.filter(person => {
      const matchesFilterText = Object.values(person).join(' ').toLowerCase().includes(filterText.value.toLowerCase())
      const matchesUnitKerja = selectedUnitKerja.value ? person.unitkerja === selectedUnitKerja.value : true
      return matchesFilterText && matchesUnitKerja
    })
  })

  const fetchPeople = async () => {
const token = useCookie("token"); // get token from cookies
 
  const response = await fetch('http://127.0.0.1:8000/api/employees', {
    headers: {
      'Authorization': `Bearer ${token.value}`,
      'Content-Type': 'application/json'
    }
  })
  const data = await response.json()
  console.log(data.data)
  people.value = data.data
}

  </script>
  
  <!-- <style scoped></style> -->