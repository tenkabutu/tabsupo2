<template>
  <div v-if="device" class="photo-detail">
    <figure class="photo-detail__pane photo-detail__image">
<!--       <img :src="photo.url" alt=""> -->
      <figcaption>Posted by {{device.端末種類.val}}</figcaption>
    </figure>
    <div class="photo-detail__pane">
      <button class="button button--like" title="Like photo">
        <i class="icon ion-md-heart"></i>12
      </button>
<!--       <a -->
<!--         :href="`/photos/${photo.id}/download`" -->
<!--         class="button" -->
<!--         title="Download photo" -->
<!--       > -->
        <i class="icon ion-md-arrow-round-down"></i>Download
      </a>
      <h2 class="photo-detail__title">
        <i class="icon ion-md-chatboxes"></i>Comments
      </h2>
    </div>
  </div>
</template>

<script>
import { OK } from '../util'

export default {
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data () {
    return {
      device: null
    }
  },
  methods: {
    async fetchDevice () {
      const response = await axios.get(`/api/devices/${this.id}`)

      if (response.status !== OK) {
        this.$store.commit('error/setCode', response.status)
        return false
      }

      this.device = response.data.record
    }
  },
  watch: {
    $route: {
      async handler () {
        await this.fetchDevice()
      },
      immediate: true
    }
  }
}
</script>