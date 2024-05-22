const cacheUtils = {
    cache: {},
    isOnCache(id) {
        return this.cache.hasOwnProperty(id);
    },
    addToCache(id, json) {
        if (this.isOnCache(id)) return;
        this.cache[id] = json;
    },
    getFromCache(id) {
        if (!this.isOnCache(id)) return;
        return this.cache[id];
    }
}

export default cacheUtils