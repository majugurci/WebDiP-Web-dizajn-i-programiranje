<?xml version="1.0" encoding="utf-8"?>

<casopisi>
			{section name=i loop=$casopisi}
                <casopis
					id="{$casopisi[i]->id_casopis}"
                    naziv="{$casopisi[i]->naziv}"
                    izdavac="{$casopisi[i]->izdavac}"
                    broj_strana="{$casopisi[i]->broj_strana}"
                    periodicnost_publikacije="{$casopisi[i]->periodicnost_publikacije}" 
					ocjena="{$ocjena[i]}" 
					brojRedaka="{$brojRedaka}" 
				/>         
            {/section}
</casopisi>
