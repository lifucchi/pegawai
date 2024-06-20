<template>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 lg:p-5">
      <div class="container mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
          <div class="w-full md:w-1/2">
            <div class="flex justify-between items-center mb-4">
              <input
                v-model="filterText"
                type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Filter table..."
              />
            </div>
          </div>
          <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            
            <NuxtLink to="/pegawai" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambahkan Pegawai
            </NuxtLink>

            <button class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" @click="printTable">Cetak Pegawai</button>

            
            <div class="flex items-center space-x-3 w-full md:w-auto">
              <div class="relative w-full">
                <select v-model="selectedUnitKerja" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-lg font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  <option value="">Filter by Unit Kerja</option>
                  <option v-for="unit in uniqueUnitKerja" :key="unit" :value="unit">{{ unit }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>
  
        <div class="overflow-x-auto print-content">
          <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
            <thead class="bg-gray-200">
              <tr>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">No</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">NIP</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Nama</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Tempat Lahir</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Alamat</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Tgl Lahir</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">L/P</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Golongan</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Eselon</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Nama Jabatan</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Tempat Tugas</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Agama</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Unit Kerja</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">No. HP</th>
                <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">NPWP</th>
                <!-- <th class="px-6 py-3 text-left text-lg font-medium text-gray-600">Foto</th> -->
                <th class="remove px-6 py-3 text-left text-lg font-medium text-gray-600">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(person, index) in filteredPeople" :key="index" class="border-b">
                <td class="px-6 py-4">{{ index+1 }}</td>
                <td class="px-6 py-4">{{ person.nip }}</td>
                <td class="px-6 py-4">{{ person.nama }}</td>
                <td class="px-6 py-4">{{ person.tempatlahir }}</td>
                <td class="px-6 py-4">{{ person.alamat }}</td>
                <td class="px-6 py-4">{{ person.tanggallahir }}</td>
                <td class="px-6 py-4">{{ person.kelamin }}</td>
                <td class="px-6 py-4">{{ person.group.golongan }}</td>
                <td class="px-6 py-4">{{ person.echelon.eselon }}</td>
                <td class="px-6 py-4">{{ person.namajabatan }}</td>
                <td class="px-6 py-4">{{ person.tempattugas }}</td>
                <td class="px-6 py-4">{{ person.religion.name }}</td>
                <td class="px-6 py-4">{{ person.unitkerja }}</td>
                <td class="px-6 py-4">{{ person.nohp }}</td>
                <td class="px-6 py-4">{{ person.npwp }}</td>
                <!-- <td class="px-6 py-4">
                  <img :src="getImageUrl(person.foto)" alt="foto" class="w-10 h-10 rounded-full" />
                </td> -->
                <td class="remove px-4 py-3 flex items-center justify-end">
                  <ul
                  class="py-1 text-lg text-gray-700 dark:text-gray-200"
                  :aria-labelledby="'dropdown-button-' + index"
                >
                  <li>
                    <NuxtLink class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" v-if="authenticated" :to="`/pegawai/${person.id}`"> Show</NuxtLink>
                  </li>
                  <div>
                    <a
                      href="#"
                      class="block py-2 px-4 text-lg text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                      @click.prevent="deleteItem(person.id)"
                    >Delete</a>
                  </div>
                </ul>
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
  const isOpen = ref(false);  // Reactive variable to toggle dropdown visibility
  import { useAuthStore } from '~/stores/useAuthStore';
  const { authenticated } = storeToRefs(useAuthStore()); // make authenticated state reactive with storeToRefs
  
  const people = ref([])

  const printTable = () => {
  const printContent = document.querySelector('.print-content');
  const originalContent = document.body.innerHTML;
  const originalTitle = document.title;

  // Create and style the title element
  const printTitle = document.createElement('div');
  printTitle.innerHTML = 'Pegawai PNS';
  printTitle.style.textAlign = 'center';
  printTitle.style.fontSize = '2em';
  printTitle.style.marginBottom = '20px';

  const originalElements = document.body.children;
  for (let i = 0; i < originalElements.length; i++) {
    originalElements[i].style.display = 'none';
  }

  document.body.appendChild(printTitle);
  const clonedPrintContent = printContent.cloneNode(true);
  document.body.appendChild(clonedPrintContent);

  // Remove elements with the 'remove' class
  const elementsToRemove = clonedPrintContent.querySelectorAll('.remove');
  elementsToRemove.forEach((element) => {
    element.remove();
  });

  // Set the document title for printing
  document.title = 'Pegawai PNS';

  // Print the document
  window.print();

  // Restore original content and title after printing
  document.body.removeChild(printTitle);
  document.body.removeChild(clonedPrintContent);

  for (let i = 0; i < originalElements.length; i++) {
    originalElements[i].style.display = '';
  }

  document.title = originalTitle;
  const router = useRouter()

  router.push('/')

};

  const deleteItem = async (itemId) => {

    try {
      const token = useCookie("token"); 
      const url = `http://127.0.0.1:8000/api/employees/${itemId}`
      const response = await fetch(url, {
        method: 'DELETE',
        headers: {
          'Authorization': `Bearer ${token.value}`,
          'Content-Type': 'application/json'
        },
      });

      if (!response.ok) {
        throw new Error('Delete request failed');
      }

      fetchPeople()

    } catch (error) {
      console.error('Error deleting item:', error.message);
    }
};
  
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
  const token = useCookie("token"); 
      const response = await fetch('http://127.0.0.1:8000/api/employees', {
        headers: {
          'Authorization': `Bearer ${token.value}`,
          'Content-Type': 'application/json'
        }
      })
      const data = await response.json()
      people.value = data.data

    }

  </script>
  
<style scoped>

/* Print-specific styles */
@media print {
  body {
        width: 210mm; /* A4 width */
        height: 297mm; /* A4 height */
        margin: 0;
        padding: 0;
        font-size: 10px; /* Adjust font size to fit more content */
      }
      .print-content {
        width: 100%;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th, td {
        padding: 5px;
        border: 1px solid black;
        word-wrap: break-word;
      }
      th {
        background-color: #f2f2f2;
      }
    .remove {
      display: none;
    }
  }
</style>