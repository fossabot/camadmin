<script setup>
defineProps({
  instanceId: {
    required: true,
    type: String,
  },
})
</script>

<template>
  <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
    <li>
      <a
        :href="route('instances.show', { id: instanceId })"
        class="pr-4 text-gray-500 hover:text-gray-700"
        :class="{ 'text-gray-900 hover:text-gray-500': route().current('instances.show') }"
        :aria-current="route().current('instances.show') ? 'page' : ''"
        >Processes</a
      >
    </li>
    <li>
      <a
        :href="route('instances.desicions', { id: instanceId })"
        class="pr-4 text-gray-500 hover:text-gray-700"
        :class="{ 'text-gray-900 hover:text-gray-500': route().current('instances.desicions') }"
        :aria-current="route().current('instances.desicions') ? 'page' : ''"
        >Desicions</a
      >
    </li>
    <li>
      <a
        :href="route('instances.incidents', { id: instanceId })"
        class="pr-4 text-gray-500 hover:text-gray-700"
        :class="{ 'text-gray-900 hover:text-gray-500': route().current('instances.incidents') }"
        >Incidents</a
      >
    </li>
    <li>
      <a
        :href="route('instances.logs', { id: instanceId })"
        class="flex items-center pr-3 pl-1 text-gray-500 hover:text-gray-700"
        :class="{ 'text-gray-900 hover:text-gray-500': route().current('instances.logs') }"
        :aria-current="route().current('instances.logs') ? 'page' : ''"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-4 h-4 mr-1"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z"
          />
        </svg>
        Logs</a
      >
    </li>
    <li>
      <a
        :href="route('instances.settings', { id: instanceId })"
        class="flex items-center pr-3 text-gray-500 hover:text-gray-700"
        :class="{ 'text-gray-900 hover:text-gray-500': route().current('instances.settings') }"
        :aria-current="route().current('instances.logs') ? 'settings' : ''"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-4 h-4 mr-1"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"
          />
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
          />
        </svg>
        Settings</a
      >
    </li>
  </ul>
</template>
