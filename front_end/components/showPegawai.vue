<template>
<div class="flex justify-between">
  <button v-if="!isEditing" @click="toggleEditing"
          class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-4 py-2">
    Ubah
  </button>

  <div class="flex space-x-4">
    <button v-if="isEditing" @click="submitForm"
            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-4 py-2">
      Simpan
    </button>

    <button v-if="isEditing" @click="cancelForm"
            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-4 py-2">
      Batal
    </button>
  </div>
</div>  
  <section class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow lg:p-8 dark:bg-gray-800 dark:border-gray-700">
      <div class="mb-4 flex justify-center">
      <img :src="getImageUrl(originalfoto)" alt="foto" class="w-64 h-auto md:max-w-64 rounded-lg" />
      <input v-if="isEditing"  style="margin-left: 3cm;" type="file" id="foto" accept="image/*" @change="handleFileChange" class="mb-4">
    </div>
      <form>
        <div class="grid gap-6 mb-6 md:grid-cols-4">
          <div>
            <label for="nip" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">NIP</label>
            <input readonly v-model="person.nip" type="text" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="NIP" required />
          </div>
          <div>
            <label for="nama" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama</label>
            <input :readonly="!isEditing"  v-model="person.nama" type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required />

          </div>

          <div>
            <label for="religion_id" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Agama</label>
            <h6 v-if="person.religion && !isEditing ">{{ person.religion.name }}</h6>
            
            <select v-if="isEditing "  v-model="person.religion_id" id="religion_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option value="" disabled>Agama</option>
              <option v-for="religion in religions" :key="religion.id" :value="religion.id">{{ religion.name }}</option>
            </select>
          </div>
          <div>
            <label for="tempatlahir" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
            <input :readonly="!isEditing"  v-model="person.tempatlahir" type="text" id="tempatlahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tempat Lahir" required />

          </div>
          <div>
            <label for="alamat" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Alamat</label>
            <input :readonly="!isEditing"  v-model="person.alamat" type="text" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alamat" required />

          </div>
          <div>
            <label for="tanggallahir" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
            <input :readonly="!isEditing"  v-model="person.tanggallahir" type="date" id="tanggallahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />

          </div>
          <div class="flex justify-center">
          <div>
            <label class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
            <div v-if="!isEditing" class="flex items-center space-x-6">
              <h6 v-if="person && person.kelamin === 'P'">Perempuan</h6>
              <h6 v-if="person && person.kelamin === 'L'">Laki-laki</h6>
            </div>
            <div v-if="isEditing" class="flex items-center space-x-6">
              <label for="gender_male" class="flex items-center">
                <input type="radio" id="gender_male" v-model="person.kelamin" value="L" class="text-blue-500 focus:ring-blue-500 dark:focus:ring-blue-500 dark:text-blue-500 w-5 h-5 mr-2" required>
                <span class="text-lg text-gray-900 dark:text-white">Laki-laki</span>
              </label>
              <label for="gender_female" class="flex items-center">
                <input type="radio" id="gender_female" v-model="person.kelamin" value="P" class="text-pink-500 focus:ring-pink-500 dark:focus:ring-pink-500 dark:text-pink-500 w-5 h-5 mr-2" required>
                <span class="text-lg text-gray-900 dark:text-white">Perempuan</span>
              </label>
            </div>
          </div>
          </div>
          <div>
            <label for="npwp" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">NPWP</label>
            <input :readonly="!isEditing"  v-model="person.npwp" type="text" id="npwp" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="NPWP" required />

          </div>
          <div>
            <label for="nohp" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">No HP</label>
            <input :readonly="!isEditing"  v-model="person.nohp" type="text" id="nohp" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="08xxxxxxxx" required />

          </div>
          <div>
            <label for="unitkerja" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Unit Kerja</label>
            <input :readonly="!isEditing"  v-model="person.unitkerja" type="text" id="unitkerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Unit Kerja" required />

          </div>
          <div>
            <label for="tempattugas" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Tempat Tugas</label>
            <input :readonly="!isEditing"  v-model="person.tempattugas" type="text" id="tempattugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tempat Tugas" required />
          </div>
          <div>
            <label for="namajabatan" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama Jabatan</label>
            <input :readonly="!isEditing"  v-model="person.namajabatan" type="text" id="namajabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Jabatan" required />

          </div>
          <div>
            <label for="echelon_id" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Eselon</label>
            <h6 v-if="person.echelon && !isEditing">{{ person.echelon.eselon }}</h6>
            <select  v-if="person.echelon && isEditing" v-model="person.echelon_id" id="echelon_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option value="" disabled>Eselon</option>
              <option v-for="echelon in echelons" :key="echelon.id" :value="echelon.id">{{ echelon.name }}</option>
            </select>
          </div>
          <div>
            <label for="group_id" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Golongan</label>
            <h6 v-if="person.group && !isEditing">{{person.group.golongan }}</h6>
            <select v-if="person.group && isEditing" v-model="person.group_id " id="echelon_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option value="" disabled>Golongan</option>
              <option v-for="group in selectedEchelonGroups" :key="group.id" :value="group.id">{{ group.name }}</option>
            </select>
          </div>
  
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-4">
        </div>

      </form>
    </section>
  </template>

<script setup lang="ts">
    
import { ref, computed, onMounted } from 'vue'

onMounted(() => {
  fetchEmployees();
  fetchReligions();
  fetchEchelons();
  })

const router = useRouter()
const person = ref([])
const isEditing = ref(false);
const originalfoto = ref(false);
const religions = ref([]); 
const echelons = ref([]); 

const toggleEditing = () => {
  isEditing.value = !isEditing.value;

}

const cancelForm = () => {
  const route = useRoute()
  isEditing.value = !isEditing.value;
  router.go();

}
const fetchReligions = async () => {
    const token = useCookie("token"); // get token from cookies
      const response = await fetch('http://127.0.0.1:8000/api/religions', {
        headers: {
          'Authorization': `Bearer ${token.value}`,
        }
      })
      const data = await response.json()
      religions.value = data.data; 

    }

    const fetchEchelons = async () => {
    const token = useCookie("token"); // get token from cookies
      const response = await fetch('http://127.0.0.1:8000/api/echelons', {
        headers: {
          'Authorization': `Bearer ${token.value}`,
          'Content-Type': 'application/json'
        }
      })
      const data = await response.json()
      echelons.value = data.map(echelon => ({
        id: echelon.id,
        name: echelon.eselon,
        groups: echelon.groups.map(group => ({
          id: group.id,
          name: group.golongan
        }))
      }));
    }

const handleFileChange = (event) => {
      person.value.foto = event.target.files[0];

    };

const submitForm = async () => {
        const token = useCookie("token").value;
        const route = useRoute()
        const employee = route.params.id;
        const url = `http://127.0.0.1:8000/api/employees/${employee}`
        const formData = new FormData();

        Object.keys(person.value).forEach(key => {
          if (key !== 'nip') {
              if (key === 'foto') {
                  if (person.value[key] instanceof File || person.value[key] instanceof Blob) {
                      formData.append(key, person.value[key]);
                  }
              } else {
                  formData.append(key, person.value[key]);
              }
          }
      });

        const result = await $fetch(url, {
                method: "POST",
                headers: {
                'Authorization': `Bearer ${token}`,
              },
                body: formData
            });  


            isEditing.value = !isEditing.value;
            router.go();
}

const fetchEmployees = async () => {
    const route = useRoute()
    const employee = route.params.id
    const url = 'http://127.0.0.1:8000/api/employees/' + employee
    const token = useCookie("token");
    const response = await fetch(url, {
        headers: {
          'Authorization': `Bearer ${token.value}`,
        }
      })
      const data = await response.json()
      person.value = data.data; 
      originalfoto.value = person.value.foto


    }
    const getImageUrl = (path) => {

    const baseUrl = 'http://localhost:8000'; 

    return `${baseUrl}/storage/${path}`;

};

const selectedEchelonGroups = computed(() => {
  const echelon = echelons.value.find(e => e.id === person.value.echelon_id);
  return echelon ? echelon.groups : [];
});

</script>