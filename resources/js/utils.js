// Creation of last method
Array.prototype.last = function(){
    return this[this.length - 1];
};
NodeList.prototype.last = Array.prototype.last;
