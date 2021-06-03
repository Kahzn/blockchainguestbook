const SHA256 = require('crypto-js/sha256')

class Block{
    constructor(index, timestamp, data, previoushash = ''){
        this.index = index;
        this.timestamp = timestamp;
        this.data = data;
        this.previoushash = previoushash;
        this.hash = this.calculateHash()
    }

    calculateHash() {
        return SHA256(this.index + this.previoushash + this.timestamp + JSON.stringify(data)).toString();
    }
}

class Blockchain{
    constructor(){
        this.chain = [this.createGenesisBlock()];
    }

    createGenesisBlock(){
        return new Block(0, "01/01/1970", "Genesis Block", "0");
    }

    getLatestBlock(){
        return this.chain[this.chain.length -1];
    }

    addBlock(newBlock){
        newBlock.previoushash = this.getLatestBlock().hash;
        newBlock.hash = newBlock.calculateHash();
        this.chain.push(newBlock);
    }

    isChainValid(){
        for( let i = 1; i < this.chain.length; i++){
            const currentBlock = this.chain[i];
            const previousBlock = this.chain[i-1];

            if(currentBlock.hash != currentBlock.calculateHash()){
                return false;
            }

            if(currentBlock.previoushash != previousBlock.hash){
                return false;
            }
        }
        return true;
    }

}

let KathiCoin = new Blockchain();
KathiCoin.addBlock(new Block(1, "1/1/1999", {amount: 55}));
KathiCoin.addBlock(new Block(2, "2/1/1999", {amount: -2}));

console.log('Is blockchain valid?' + KathiCoin.isChainValid());
