<template>
    <section class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow lg:p-8 dark:bg-gray-800 dark:border-gray-700">
      <form @submit.prevent="submitForm">
        <div class="grid gap-6 mb-6 md:grid-cols-3">
          <div>
            <label for="nip" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">NIP</label>
            <input v-model="form.nip" type="text" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="NIP" required />
          </div>
          <div>
            <label for="nama" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama</label>
            <input v-model="form.nama" type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama" required />
          </div>

          <div>
            <label for="religion_id" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Agama</label>
            <select v-model="form.religion_id" id="religion_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option value="" disabled>Agama</option>
              <option v-for="religion in religions" :key="religion.id" :value="religion.id">{{ religion.name }}</option>
            </select>
          </div>
          <div>
            <label for="tempatlahir" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
            <input v-model="form.tempatlahir" type="text" id="tempatlahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tempat Lahir" required />
          </div>
          <div>
            <label for="alamat" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Alamat</label>
            <input v-model="form.alamat" type="text" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alamat" required />
          </div>
          <div>
            <label for="tanggallahir" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
            <input v-model="form.tanggallahir" type="date" id="tanggallahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
          </div>
          <div class="flex justify-center">
          <div>
            <label class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
            <div class="flex items-center space-x-6">
              <label for="gender_male" class="flex items-center">
                <input type="radio" id="gender_male" v-model="form.kelamin" value="L" class="text-blue-500 focus:ring-blue-500 dark:focus:ring-blue-500 dark:text-blue-500 w-5 h-5 mr-2" required>
                <span class="text-lg text-gray-900 dark:text-white">Laki-laki</span>
              </label>
              <label for="gender_female" class="flex items-center">
                <input type="radio" id="gender_female" v-model="form.kelamin" value="P" class="text-pink-500 focus:ring-pink-500 dark:focus:ring-pink-500 dark:text-pink-500 w-5 h-5 mr-2" required>
                <span class="text-lg text-gray-900 dark:text-white">Perempuan</span>
              </label>
            </div>
          </div>
        </div>
          <div>
            <label for="npwp" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">NPWP</label>
            <input v-model="form.npwp" type="text" id="npwp" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="NPWP" required />
          </div>
          <div>
            <label for="nohp" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">No HP</label>
            <input v-model="form.nohp" type="text" id="nohp" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="08xxxxxxxx" required />
          </div>
          <div>
            <label for="unitkerja" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Unit Kerja</label>
            <input v-model="form.unitkerja" type="text" id="unitkerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Unit Kerja" required />
          </div>
          <div>
            <label for="tempattugas" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Tempat Tugas</label>
            <input v-model="form.tempattugas" type="text" id="tempattugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tempat Tugas" required />
          </div>
          <div>
            <label for="namajabatan" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Nama Jabatan</label>
            <input v-model="form.namajabatan" type="text" id="namajabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Jabatan" required />
          </div>
          <div>
            <label for="echelon_id" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Eselon</label>
            <select v-model="form.echelon_id" id="echelon_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option value="" disabled>Eselon</option>
              <option v-for="echelon in echelons" :key="echelon.id" :value="echelon.id">{{ echelon.name }}</option>
            </select>
          </div>
          <div>
            <label for="group_id" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Golongan</label>
            <select v-model="form.group_id" id="echelon_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option value="" disabled>Golongan</option>
              <option v-for="group in selectedEchelonGroups" :key="group.id" :value="group.id">{{ group.name }}</option>
            </select>
          </div>
            <div class="mb-4">
              <label for="foto" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Upload Picture</label>
              <input  type="file" id="foto" accept="image/*" @change="handleFileChange" class="mb-4">
            </div>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full lg:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
    </section>
  </template>
   
<script setup lang="ts">
    import { ref, computed, onMounted } from 'vue'

    const router = useRouter()
    onMounted(() => {
        fetchReligions();
        fetchEchelons();
        // fetchGroups();
      })

    const form = ref({
    nip: '',
    nama: '',
    tempatlahir: '',
    alamat: '',
    tanggallahir: '',
    kelamin: '',
    npwp: '',
    nohp: '',
    unitkerja: '',
    tempattugas: '',
    namajabatan: '',
    foto: null,
    echelon_id: '',
    group_id: '',
    religion_id:''
    })

    const religions = ref([]); 
    const echelons = ref([]); 
    const groups = ref([]); 

    const handleFileChange = (event) => {
      form.value.foto = event.target.files[0];
    };

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

    const submitForm = async () => {
        const token = useCookie("token").value; // get token from cookies
        const formData = new FormData();
        Object.keys(form.value).forEach(key => {
          formData.append(key, form.value[key]);
        });
  
        const result = await $fetch(`http://127.0.0.1:8000/api/employees/`, {
                method: "POST",
                headers: {
                'Authorization': `Bearer ${token}`,
                },
                body: formData,
            });  

            router.push('/');
}

const selectedEchelonGroups = computed(() => {
  const echelon = echelons.value.find(e => e.id === form.value.echelon_id);
  return echelon ? echelon.groups : [];
});



</script>