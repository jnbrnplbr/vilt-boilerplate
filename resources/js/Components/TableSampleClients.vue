<script setup>
import { computed, ref } from "vue";
import { useMainStore } from "@/Stores/main";
import { mdiEye, mdiTrashCan } from "@mdi/js";
import CardBoxModal from "@/Components/CardBoxModal.vue";
import TableCheckboxCell from "@/Components/TableCheckboxCell.vue";
import BaseLevel from "@/Components/BaseLevel.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import BaseButton from "@/Components/BaseButton.vue";
import UserAvatar from "@/Components/UserAvatar.vue";

const props = defineProps({
  checkable: Boolean,
  itemPerPage: {
    type: Number,
    default: 6
  },

});

const mainStore = useMainStore();

// const items = computed(() => mainStore.clients);
const items = ref([
    {
        "id": 19,
        "login": "percy64",
        "name": "Howell Hand",
        "company": "Kiehn-Green",
        "city": "Emelyside",
        "progress": 70,
        "created": "Mar 3, 2023",
        "created_mm_dd_yyyy": "03-03-2023"
    },
    {
        "id": 11,
        "login": "dare.concepcion",
        "name": "Hope Howe",
        "company": "Nolan Inc",
        "city": "Paristown",
        "progress": 68,
        "created": "Dec 1, 2023",
        "created_mm_dd_yyyy": "12-01-2023"
    },
    {
        "id": 32,
        "login": "geovanni.kessler",
        "name": "Nelson Jerde",
        "company": "Nitzsche LLC",
        "city": "Jailynbury",
        "progress": 49,
        "created": "May 18, 2023",
        "created_mm_dd_yyyy": "05-18-2023"
    },
    {
        "id": 22,
        "login": "macejkovic.dashawn",
        "name": "Kim Weimann",
        "company": "Brown-Lueilwitz",
        "city": "New Emie",
        "progress": 38,
        "created": "May 4, 2023",
        "created_mm_dd_yyyy": "05-04-2023"
    },
    {
        "id": 34,
        "login": "hilpert.leora",
        "name": "Justice O'Reilly",
        "company": "Lakin-Muller",
        "city": "New Kacie",
        "progress": 38,
        "created": "Mar 27, 2023",
        "created_mm_dd_yyyy": "03-27-2023"
    },
    {
        "id": 48,
        "login": "ferry.sophia",
        "name": "Adrienne Mayer III",
        "company": "Kozey, McLaughlin and Kuhn",
        "city": "Howardbury",
        "progress": 39,
        "created": "Mar 29, 2023",
        "created_mm_dd_yyyy": "03-29-2023"
    },
    {
        "id": 20,
        "login": "gokuneva",
        "name": "Mr. Julien Ebert",
        "company": "Cormier LLC",
        "city": "South Serenaburgh",
        "progress": 29,
        "created": "Jun 25, 2023",
        "created_mm_dd_yyyy": "06-25-2023"
    },
    {
        "id": 47,
        "login": "paolo.walter",
        "name": "Lenna Smitham",
        "company": "King Inc",
        "city": "McCulloughfort",
        "progress": 59,
        "created": "Oct 8, 2023",
        "created_mm_dd_yyyy": "10-08-2023"
    },
    {
        "id": 24,
        "login": "lkessler",
        "name": "Travis Davis",
        "company": "Leannon and Sons",
        "city": "West Frankton",
        "progress": 52,
        "created": "Oct 20, 2023",
        "created_mm_dd_yyyy": "10-20-2023"
    },
    {
        "id": 49,
        "login": "shana.lang",
        "name": "Prof. Esteban Steuber",
        "company": "Langosh-Ernser",
        "city": "East Sedrick",
        "progress": 34,
        "created": "May 16, 2023",
        "created_mm_dd_yyyy": "05-16-2023"
    },
    {
        "id": 36,
        "login": "jewel07",
        "name": "Russell Goodwin V",
        "company": "Nolan-Stracke",
        "city": "Williamsonmouth",
        "progress": 55,
        "created": "Apr 22, 2023",
        "created_mm_dd_yyyy": "04-22-2023"
    },
    {
        "id": 33,
        "login": "burnice.okuneva",
        "name": "Ms. Cassidy Wiegand DVM",
        "company": "Kuhlman-Hahn",
        "city": "New Ruthiehaven",
        "progress": 76,
        "created": "Sep 16, 2023",
        "created_mm_dd_yyyy": "09-16-2023"
    },
    {
        "id": 44,
        "login": "oconnell.juanita",
        "name": "Mr. Watson Brakus PhD",
        "company": "Osinski, Bins and Kuhn",
        "city": "Lake Gloria",
        "progress": 58,
        "created": "Jun 22, 2023",
        "created_mm_dd_yyyy": "06-22-2023"
    },
    {
        "id": 46,
        "login": "vgutmann",
        "name": "Mr. Garrison Friesen V",
        "company": "VonRueden, Rippin and Pfeffer",
        "city": "Port Cieloport",
        "progress": 39,
        "created": "Oct 19, 2023",
        "created_mm_dd_yyyy": "10-19-2023"
    },
    {
        "id": 14,
        "login": "veum.lucio",
        "name": "Ms. Sister Morar",
        "company": "Gusikowski, Altenwerth and Abbott",
        "city": "Lake Macville",
        "progress": 34,
        "created": "Jun 11, 2023",
        "created_mm_dd_yyyy": "06-11-2023"
    },
    {
        "id": 40,
        "login": "edietrich",
        "name": "Ms. Laisha Reinger",
        "company": "Boehm PLC",
        "city": "West Alexiemouth",
        "progress": 73,
        "created": "Nov 2, 2023",
        "created_mm_dd_yyyy": "11-02-2023"
    },
    {
        "id": 5,
        "login": "mose44",
        "name": "Cameron Lind",
        "company": "Tremblay, Padberg and Pouros",
        "city": "Naderview",
        "progress": 59,
        "created": "Sep 14, 2023",
        "created_mm_dd_yyyy": "09-14-2023"
    },
    {
        "id": 43,
        "login": "rau.abelardo",
        "name": "Sarai Little",
        "company": "Deckow LLC",
        "city": "Jeanieborough",
        "progress": 49,
        "created": "Jun 13, 2023",
        "created_mm_dd_yyyy": "06-13-2023"
    },
    {
        "id": 2,
        "login": "imurazik",
        "name": "Shyann Kautzer",
        "company": "Osinski, Boehm and Kihn",
        "city": "New Alvera",
        "progress": 41,
        "created": "Feb 15, 2023",
        "created_mm_dd_yyyy": "02-15-2023"
    },
    {
        "id": 15,
        "login": "annalise97",
        "name": "Lorna Christiansen",
        "company": "Altenwerth-Friesen",
        "city": "Port Elbertland",
        "progress": 36,
        "created": "Mar 9, 2023",
        "created_mm_dd_yyyy": "03-09-2023"
    }
]);

const isModalActive = ref(false);

const isModalDangerActive = ref(false);

const perPage = ref(props.itemPerPage);

const currentPage = ref(0);

const checkedRows = ref([]);

const itemsPaginated = computed(() =>
  items.value.slice(
    perPage.value * currentPage.value,
    perPage.value * (currentPage.value + 1)
  )
);

const numPages = computed(() => Math.ceil(items.value.length / perPage.value));

const currentPageHuman = computed(() => currentPage.value + 1);

const pagesList = computed(() => {
  const pagesList = [];

  for (let i = 0; i < numPages.value; i++) {
    pagesList.push(i);
  }

  return pagesList;
});

const remove = (arr, cb) => {
  const newArr = [];

  arr.forEach((item) => {
    if (!cb(item)) {
      newArr.push(item);
    }
  });

  return newArr;
};

const checked = (isChecked, client) => {
  if (isChecked) {
    checkedRows.value.push(client);
  } else {
    checkedRows.value = remove(
      checkedRows.value,
      (row) => row.id === client.id
    );
  }
};


</script>

<template>
  <CardBoxModal v-model="isModalActive" title="Sample modal">
    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
    <p>This is sample modal</p>
  </CardBoxModal>

  <CardBoxModal
    v-model="isModalDangerActive"
    title="Please confirm"
    button="danger"
    has-cancel
  >
    <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
    <p>This is sample modal</p>
  </CardBoxModal>

  <div v-if="checkedRows.length" class="p-3 bg-gray-100/50 dark:bg-slate-800">
    <span
      v-for="checkedRow in checkedRows"
      :key="checkedRow.id"
      class="inline-block px-2 py-1 rounded-sm mr-2 text-sm bg-gray-100 dark:bg-slate-700"
    >
      {{ checkedRow.name }}
    </span>
  </div>

  <table>
    <thead>
      <tr>
        <th v-if="props.checkable" />
        <th />
        <th>Name</th>
        <th>Company</th>
        <th>City</th>
        <th>Progress</th>
        <th>Created</th>
        <th />
      </tr>
    </thead>
    <tbody>
      <tr v-for="client in itemsPaginated" :key="client.id">
        <TableCheckboxCell
          v-if="checkable"
          @checked="checked($event, client)"
        />
        <td class="border-b-0 lg:w-6 before:hidden">
          <UserAvatar
            :username="client.name"
            class="w-24 h-24 mx-auto lg:w-6 lg:h-6"
          />
        </td>
        <td data-label="Name">
          {{ client.name }}
        </td>
        <td data-label="Company">
          {{ client.company }}
        </td>
        <td data-label="City">
          {{ client.city }}
        </td>
        <td data-label="Progress" class="lg:w-32">
          <progress
            class="flex w-2/5 self-center lg:w-full"
            max="100"
            :value="client.progress"
          >
            {{ client.progress }}
          </progress>
        </td>
        <td data-label="Created" class="lg:w-1 whitespace-nowrap">
          <small
            class="text-gray-500 dark:text-slate-400"
            :title="client.created"
            >{{ client.created }}</small
          >
        </td>
        <td class="before:hidden lg:w-1 whitespace-nowrap">
          <BaseButtons type="justify-start lg:justify-end" no-wrap>
            <BaseButton
              color="info"
              :icon="mdiEye"
              small
              @click="isModalActive = true"
            />
            <BaseButton
              color="danger"
              :icon="mdiTrashCan"
              small
              @click="isModalDangerActive = true"
            />
          </BaseButtons>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="p-3 lg:px-6 border-t border-gray-100 dark:border-slate-800">
    <BaseLevel>
      <BaseButtons>
        <BaseButton
          v-for="page in pagesList"
          :key="page"
          :active="page === currentPage"
          :label="page + 1"
          :color="page === currentPage ? 'lightDark' : 'whiteDark'"
          small
          @click="currentPage = page"
        />
      </BaseButtons>
      <small>Page {{ currentPageHuman }} of {{ numPages }}</small>
    </BaseLevel>
  </div>
</template>
