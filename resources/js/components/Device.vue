<template>
	<tr class="device">
		<td>{{item.端末種類.val}}</td>
     <td>{{item.管理番号.val}}</td>
     <td>{{item.自治体.val}}</td>
     <td>{{item.状態.val}}</td>
      <td><RouterLink
      class="device__overlay"
      :to="`/devices/${item.ID.val}`"
      :title="`View the device by ${item.端末種類.val}`">
        <button
          class="photo__action photo__action--like"
          title="Like photo"
        >
        </button>
          <i class="icon ion-md-arrow-round-down">編集</i>


    </RouterLink></td>
  </tr>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  }
}
</script>